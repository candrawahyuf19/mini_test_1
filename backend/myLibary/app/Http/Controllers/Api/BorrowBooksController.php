<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BorrowBooksDetailModel;
use App\Models\BorrowBooksModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BorrowBooksController extends Controller
{
    public function index()
    {
        $books = BorrowBooksModel::orderBy("id_borrow", "desc")->get();

        $datatable = DataTables::of($books)
            ->addIndexColumn()
            ->toJson();

        return $datatable;
    }

    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                "id_users" => "required",
                "borrowing_time" => "required",
                "id_books" => "required|array",
            ]
        );

        if ($validate->fails()) {
            return response()->json([
                "msg" => "Gagal disimpan",
                "error" => $validate->errors(),
            ], 400);
        }

        try {
            DB::beginTransaction();

            $borrowing_time = $request->input("borrowing_time");
            $return_time = Carbon::parse($borrowing_time)->addWeek();
            $borrowData = [
                "id_users" => $request->input("id_users"),
                "borrowing_time" => $borrowing_time,
                "return_time" => $return_time,
                "status" => "borrow",
            ];

            $borrow = BorrowBooksModel::create($borrowData);

            $listBookOutOfStock = [];

            foreach ($request->id_books as $bookId) {
                // Periksa jumlah stok buku
                $cekStok = DB::table("books")
                    ->select("title", "stock")
                    ->where("id_books", $bookId)
                    ->first();

                if ($cekStok->stock > 0) {
                    // Jika stok mencukupi, simpan detail peminjaman buku
                    BorrowBooksDetailModel::create([
                        "id_borrow" => $borrow->id_borrow,
                        "id_books" => $bookId
                    ]);

                    // Kurangi stok buku
                    DB::table("books")
                        ->where("id_books", $bookId)
                        ->decrement("stock");
                } else {
                    // Jika stok tidak mencukupi, tambahkan informasi buku ke array
                    $listBookOutOfStock[] = $cekStok->title;
                }
            }

            if (!empty($listBookOutOfStock)) {
                // Jika ada buku yang stoknya tidak mencukupi, kembalikan pesan kesalahan beserta nama-nama buku tersebut
                DB::rollback();
                return response()->json([
                    "status" => 400,
                    "msg" => "Gagal disimpan. Stok buku tidak mencukupi.",
                    "list_books" => $listBookOutOfStock
                ], 400);
            } else {
                // Jika semua buku memiliki stok yang mencukupi, commit transaksi
                DB::commit();
                return response()->json([
                    "status" => 200,
                    "msg" => "Berhasil disimpan"
                ], 200);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                "status" => 500,
                "msg" => "Gagal disimpan",
                "error" => $e->getMessage()
            ], 500);
        }
    }



    // public function show(string $id_books)
    // {
    //     $books = BooksModel::find($id_books);

    //     if (empty($books)) {
    //         return response()->json([
    //             "status" => 400,
    //             "msg" => "data buku tidak ada",
    //         ], 400);
    //     } else {
    //         return response()->json([
    //             "status" => 200,
    //             "data" => $books
    //         ], 200);
    //     }
    // }

    // public function update(Request $request, string $id_books)
    // {
    //     $validate = Validator::make(
    //         $request->all(),
    //         [
    //             "id_categories" => "required",
    //             "title" => "required",
    //             "author" => "required",
    //             "bookcase" => "required",
    //             "stock" => "required|numeric",
    //             "cover" => "required",
    //         ]
    //     );

    //     if ($validate->fails()) {
    //         return response()->json([
    //             "status" => 400,
    //             "msg" => "Gagal diubah",
    //             "error" => $validate->errors(),
    //         ], 400);
    //     } else {
    //         $data = $request->only("id_categories", "title", "author", "bookcase", "stock", "cover");

    //         BooksModel::find($id_books)->update($data);

    //         return response()->json([
    //             "status" => 200,
    //             "msg" => "Berhasil diubah"
    //         ], 200);
    //     }
    // }

    // public function destroy(string $id_books)
    // {
    //     $books = BooksModel::where("id_books", $id_books)->first();

    //     if (empty($books)) {
    //         return response()->json([
    //             "status" => 400,
    //             "msg" => "Gagal dihapus, Data tidak ada",
    //         ], 400);
    //     } else {
    //         $books->delete();
    //         return response()->json([
    //             "status" => 200,
    //             "msg" => "Berhasil dihapus",
    //         ], 200);
    //     }
    // }
}

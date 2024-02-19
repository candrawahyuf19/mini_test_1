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

use function Laravel\Prompts\select;

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
            $dl_return_time = Carbon::parse($borrowing_time)->addWeek();
            $borrowData = [
                "id_users" => $request->input("id_users"),
                "borrowing_time" => $borrowing_time,
                "deadline_return_time" => $dl_return_time,
                "status" => "borrow",
            ];

            $borrow = BorrowBooksModel::create($borrowData);

            $listBookOutOfStock = [];

            foreach ($request->id_books as $bookId) {
                // cek stok buku
                $cekStok = DB::table("books")
                    ->select("title", "stock")
                    ->where("id_books", $bookId)
                    ->first();

                if ($cekStok->stock > 0) {
                    BorrowBooksDetailModel::create([
                        "id_borrow" => $borrow->id_borrow,
                        "id_books" => $bookId
                    ]);

                    // Kurangi stok buku
                    DB::table("books")
                        ->where("id_books", $bookId)
                        ->decrement("stock");
                } else {

                    $listBookOutOfStock[] = $cekStok->title;
                }
            }

            if (!empty($listBookOutOfStock)) {
                DB::rollback();
                return response()->json([
                    "status" => 400,
                    "msg" => "Gagal disimpan. Stok buku tidak mencukupi.",
                    "list_books" => $listBookOutOfStock
                ], 400);
            } else {
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

    public function list_borrow_byUser(Request $request)
    {
        $id_users = $request->input("id_users");

        if ($id_users) {
            $list_book = DB::table("borrow_books")
                ->join("borrow_books_detail as bd", "bd.id_borrow", "=", "borrow_books.id_borrow")
                ->where("borrow_books.id_users", $id_users)
                ->select("*")
                ->get();

            return response()->json([
                "status" => 200,
                "msg" => "terdapat buku",
                "data" => $list_book,
            ], 200);
        } else {
            return response()->json([
                "status" => 400,
                "msg" => "belum meminjam buku",
            ], 400);
            // dd($list_book);
        }
    }

    // public function update(Request $request, string $id_books)
    // {
    //     
    // }

    // public function destroy(string $id_books)
    // {
    //    
    // }
}

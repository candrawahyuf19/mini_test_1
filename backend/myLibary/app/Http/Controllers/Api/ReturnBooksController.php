<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BorrowBooksModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReturnBooksController extends Controller
{

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "id_users" => "required",
            "id_borrow" => "required",
        ]);

        if ($validate->fails()) {
            return response()->json([
                "msg" => "Gagal disimpan",
                "error" => $validate->errors(),
            ], 400);
        }

        $dataReturn = [
            "status" => "return",
            "user_return_time" => date('Y-m-d H:i:s'),
        ];

        BorrowBooksModel::where("id_borrow", $request->input("id_borrow"))->update($dataReturn);

        $id_books = DB::table("borrow_books")
            ->join("borrow_books_detail as bd", "bd.id_borrow", "=", "borrow_books.id_borrow")
            ->where("borrow_books.id_borrow", $request->input("id_borrow"))
            ->pluck("bd.id_books")
            ->toArray();

        // Perbarui stok buku
        DB::table("books")
            ->whereIn("id_books", $id_books)
            ->update(["stock" => DB::raw("stock + 1")]);

        return response()->json([
            "status" => 200,
            "msg" => "Stok buku telah diperbarui",
        ], 200);
    }


    public function show(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}

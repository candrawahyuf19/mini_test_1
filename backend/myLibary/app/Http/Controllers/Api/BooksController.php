<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BooksModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BooksController extends Controller
{
    public function index()
    {
        $books = BooksModel::orderBy("id_books", "desc")->get();

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
                "id_categories" => "required",
                "title" => "required",
                "author" => "required",
                "bookcase" => "required",
                "stock" => "required|numeric",
                "cover" => "required",
            ]
        );

        if ($validate->fails()) {
            return response()->json([
                "msg" => "Gagal disimpan",
                "error" => $validate->errors(),
            ], 400);
        } else {
            $data = $request->only("id_categories", "title", "author", "bookcase", "stock", "cover");

            BooksModel::create($data);

            return response()->json([
                "status" => 200,
                "msg" => "Berhasil disimpan"
            ], 200);
        }
    }

    public function show(string $id_books)
    {
        $books = BooksModel::find($id_books);

        if (empty($books)) {
            return response()->json([
                "status" => 400,
                "msg" => "data buku tidak ada",
            ], 400);
        } else {
            return response()->json([
                "status" => 200,
                "data" => $books
            ], 200);
        }
    }

    public function update(Request $request, string $id_books)
    {
        $validate = Validator::make(
            $request->all(),
            [
                "id_categories" => "required",
                "title" => "required",
                "author" => "required",
                "bookcase" => "required",
                "stock" => "required|numeric",
                "cover" => "required",
            ]
        );

        if ($validate->fails()) {
            return response()->json([
                "status" => 400,
                "msg" => "Gagal diubah",
                "error" => $validate->errors(),
            ], 400);
        } else {
            $data = $request->only("id_categories", "title", "author", "bookcase", "stock", "cover");

            BooksModel::find($id_books)->update($data);

            return response()->json([
                "status" => 200,
                "msg" => "Berhasil diubah"
            ], 200);
        }
    }

    public function destroy(string $id_books)
    {
        $books = BooksModel::where("id_books", $id_books)->first();

        if (empty($books)) {
            return response()->json([
                "status" => 400,
                "msg" => "Gagal dihapus, Data tidak ada",
            ], 400);
        } else {
            $books->delete();
            return response()->json([
                "status" => 200,
                "msg" => "Berhasil dihapus",
            ], 200);
        }
    }
}

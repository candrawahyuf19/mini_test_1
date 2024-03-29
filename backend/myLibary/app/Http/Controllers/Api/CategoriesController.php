<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = CategoriesModel::orderBy("id_categories", "desc")->get();

        $datatable = DataTables::of($categories)
            ->addIndexColumn()
            ->toJson();

        return $datatable;
    }

    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                "name_cat" => "required",
                "description" => "required",
            ]
        );

        if ($validate->fails()) {
            return response()->json([
                "msg" => "Gagal disimpan",
                "error" => $validate->errors(),
            ], 400);
        } else {
            $data = $request->only("name_cat", "description");

            CategoriesModel::create($data);

            return response()->json([
                "status" => 200,
                "msg" => "Berhasil disimpan"
            ], 200);
        }
    }

    public function show(CategoriesModel $categoriesModel, string $id_categories)
    {
        $id_categories = $categoriesModel->find($id_categories);

        if (empty($id_categories)) {
            return response()->json([
                "status" => 400,
                "msg" => "data kategori tidak ada",
            ], 400);
        } else {
            return response()->json([
                "status" => 200,
                "data" => $id_categories
            ], 200);
        }
    }

    public function update(Request $request, string $id_categories)
    {
        $validate = Validator::make(
            $request->all(),
            [
                "name_cat" => "required",
                "description" => "required",
            ]
        );

        if ($validate->fails()) {
            return response()->json([
                "status" => 400,
                "msg" => "Gagal diubah",
                "error" => $validate->errors(),
            ], 400);
        } else {
            $data = $request->only("name_cat", "description");

            CategoriesModel::where("id_categories", $id_categories)->update($data);

            return response()->json([
                "status" => 200,
                "msg" => "Berhasil diubah"
            ], 200);
        }
    }

    public function destroy(string $id_categories)
    {
        $categories = CategoriesModel::where("id_categories", $id_categories)->first();

        if (empty($categories)) {
            return response()->json([
                "status" => 400,
                "msg" => "Gagal dihapus, Data tidak ada",
            ], 400);
        } else {
            $categories->delete();
            return response()->json([
                "status" => 200,
                "msg" => "Berhasil dihapus",
            ], 200);
        }
    }
}

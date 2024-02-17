<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Http\Controllers\Controller;
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

    public function create()
    {
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
                "status" => false,
                "msg" => "Data gagal disimpan",
                "error" => $validate->errors(),
            ]);
        }
        // jika berhasil
        else {
            $data = $request->only("name_cat", "description");

            CategoriesModel::create($data);

            return response()->json([
                "status" => true,
                "msg" => "Data berhasil disimpan"
            ]);
        }
    }

    public function show(CategoriesModel $categoriesModel)
    {
        //
    }


    public function edit(CategoriesModel $categoriesModel)
    {
        //
    }

    public function update(Request $request, CategoriesModel $categoriesModel)
    {
        //
    }

    public function destroy(string $id_categories)
    {
        $categories = CategoriesModel::where("id_categories", $id_categories)->first();
        $categories->delete();

        return response()->json([
            "status" => true,
            "msg" => "Deleted",
        ]);
    }
}

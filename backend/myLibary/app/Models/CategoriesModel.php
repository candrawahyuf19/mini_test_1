<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $primaryKey = "id_categories";
    protected $fillable = [
        "name_cat",
        "description",
    ];
}

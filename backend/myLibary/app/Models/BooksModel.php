<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksModel extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $primaryKey = "id_books";
    protected $fillable = [
        "id_categories",
        "title",
        'author',
        'bookcase',
        'stock',
        'cover',
    ];
}

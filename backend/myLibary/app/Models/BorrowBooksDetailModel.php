<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowBooksDetailModel extends Model
{
    use HasFactory;

    protected $table = "borrow_books_detail";
    protected $primaryKey = "id_borrow_detail";
    protected $fillable = [
        "id_borrow",
        "id_books",
    ];
}

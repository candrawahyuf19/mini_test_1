<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowBooksModel extends Model
{
    use HasFactory;

    protected $table = "borrow_books";
    protected $primaryKey = "id_borrow";
    protected $fillable = [
        "id_users",
        "borrowing_time",
        "deadline_return_time",
        "user_return_time",
        "status",
    ];
}

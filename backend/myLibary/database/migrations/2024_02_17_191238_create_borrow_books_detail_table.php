<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrow_books_detail', function (Blueprint $table) {
            $table->id("id_borrow_detail");
            $table->unsignedBigInteger("id_borrow");
            $table->unsignedBigInteger("id_books");
            $table->timestamps();

            $table->foreign('id_borrow')->references('id_borrow')->on('borrow_books')->onDelete('cascade');
            $table->foreign('id_books')->references('id_books')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_books_detail');
    }
};

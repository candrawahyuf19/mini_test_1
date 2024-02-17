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
        Schema::create('books', function (Blueprint $table) {
            $table->id('id_books');
            $table->unsignedBigInteger('id_categories');
            $table->string('title');
            $table->string('author');
            $table->string('bookcase');
            $table->integer('stock');
            $table->string('cover');
            $table->timestamps();

            $table->foreign('id_categories')->references('id_categories')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

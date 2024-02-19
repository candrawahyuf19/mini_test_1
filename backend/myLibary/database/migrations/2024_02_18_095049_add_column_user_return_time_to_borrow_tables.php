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
        Schema::table('borrow_books', function (Blueprint $table) {
            $table->renameColumn("return_time", "deadline_return_time");
            $table->datetime("user_return_time")->after("return_time")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('borrow_books', function (Blueprint $table) {
            $table->renameColumn("deadline_return_time", "return_time");
            $table->dropColumn("user_return_time");
        });
    }
};

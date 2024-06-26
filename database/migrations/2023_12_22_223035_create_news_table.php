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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string("author", 60)->nullable();
            $table->string("email", 120)->nullable();
            $table->string("phone", 20)->nullable();
            $table->string("title", 256);
            $table->longText("description");
            $table->string("path_image");
            $table->enum('status', ['rejected', 'consideration', 'approved']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};

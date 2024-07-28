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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // id column (auto-incrementing primary key)
            $table->unsignedBigInteger('userID'); // foreign key for users
            $table->unsignedBigInteger('doctorID'); // foreign key for doctors
            $table->text('comment'); // comment text
            $table->unsignedTinyInteger('rating'); // rating column (1-5 scale)
            $table->timestamps(); // created_at and updated_at columns

            // Add foreign key constraints
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctorID')->references('id')->on('doctors')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

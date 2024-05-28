<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->string('company_name');
            $table->text('deskripsi');
            $table->string('logo');
            $table->text('email');
            $table->text('phone');
            $table->text('addres');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

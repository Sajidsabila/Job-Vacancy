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
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('religion_id');
            $table->unsignedBigInteger('skill_id');
            $table->string("photo");
            $table->date("birth_date");
            $table->string('first_name');
            $table->string('gender');
            $table->string('last_name');
            $table->text('address');
            $table->string('phone');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('religion_id')->references('id')->on('religions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seekers');
    }
};

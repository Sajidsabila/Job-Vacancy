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
        Schema::create('job_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('job_seeker_id');
            $table->string('file', 100);
            $table->string('status', 50)->nullable()->default('Lamaran Terkrim');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_histories');
    }
};

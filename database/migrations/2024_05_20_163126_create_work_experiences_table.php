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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_seeker_id');
            $table->string('company_name');
            $table->string('position');
            $table->year('start_year');
            $table->string('start_month');
            $table->year('end_year')->nullable();
            $table->string('end_month')->nullable();
            $table->boolean('ongoing')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};

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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('job_category_id');
            $table->unsignedBigInteger('job_time_type_id');
            $table->json('requirement_id');
            $table->json('benefit_id');
            $table->date("endDate");
            $table->string('title');
            $table->string('slug')->unique();
            $table->date('interview_date');
            $table->time('interview_time');
            $table->string('description');
            $table->float('salary', 10, 2);
            $table->enum('status', ['Active', 'Unactive']);
            $table->string('job_location', 50);

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('job_category_id')->references('id')->on('job_categories');
            $table->foreign('job_time_type_id')->references('id')->on('job_time_types');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
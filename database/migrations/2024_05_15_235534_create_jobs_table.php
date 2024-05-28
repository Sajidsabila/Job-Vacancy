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
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description');
            $table->string('type', 100);
            $table->float('salary');
            $table->string('job_location', 50);
            $table->string('name', 100);
            $table->string('requirements');
            $table->date('deadline');

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->foreign('job_time_type_id')->references('id')->on('job_time_types')->onDelete('cascade');
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
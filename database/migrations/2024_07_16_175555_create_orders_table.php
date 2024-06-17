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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("job_id");
            $table->unsignedBigInteger('package_id');
            $table->float('price');
            $table->enum('status', ['Unpaid', 'Paid']);
            $table->timestamps();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('package_id')->references('id')->on('packages');
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
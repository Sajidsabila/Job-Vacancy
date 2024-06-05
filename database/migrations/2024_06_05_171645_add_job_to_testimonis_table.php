<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobToTestimonisTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('testimonis', function (Blueprint $table) {
            $table->string('job')->after('quote'); // Tambahkan kolom job setelah kolom quote
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('testimonis', function (Blueprint $table) {
            $table->dropColumn('job');
        });
    }
}
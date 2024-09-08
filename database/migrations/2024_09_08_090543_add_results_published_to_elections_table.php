<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('elections', function (Blueprint $table) {
            $table->boolean('results_published')->default(false); // Adding results_published column
        });
    }

    public function down()
    {
        Schema::table('elections', function (Blueprint $table) {
            $table->dropColumn('results_published'); // Rollback if necessary
        });
    }

};

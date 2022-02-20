<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAllCoulmnsNullableInDiagnosticTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diagnostic_tests', function (Blueprint $table) {
            $table->string('ahi')->nullable()->change();
            $table->string('rdi')->nullable()->change();
            $table->string('nadir')->nullable()->change();
            $table->string('odi')->nullable()->change();
            $table->decimal('avg_duration_of_apnea')->nullable()->change();
            $table->decimal('max_duration_of_apnea')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diagnostic_tests', function (Blueprint $table) {
            $table->string('ahi')->nullable(false)->change();
            $table->string('rdi')->nullable(false)->change();
            $table->string('nadir')->nullable(false)->change();
            $table->string('odi')->nullable(false)->change();
            $table->decimal('avg_duration_of_apnea')->nullable(false)->change();
            $table->decimal('max_duration_of_apnea')->nullable(false)->change();
        });
    }
}

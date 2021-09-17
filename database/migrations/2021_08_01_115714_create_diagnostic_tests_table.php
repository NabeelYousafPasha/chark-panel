<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostic_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained('assessments');
            $table->string('ahi');
            $table->string('rdi');
            $table->string('nadir');
            $table->string('odi');
            $table->decimal('avg_duration_of_apnea');
            $table->decimal('max_duration_of_apnea');
            $table->longText('assessments_observation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnostic_tests');
    }
}

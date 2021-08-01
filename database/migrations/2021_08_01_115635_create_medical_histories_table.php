<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained('assessments');
            $table->boolean('smoker');
            $table->boolean('alcohol_with_dinner');

            $table->boolean('high_blood_pressure');
            $table->boolean('myocardial_infarction');
            $table->boolean('coronary_artery_disease');
            $table->boolean('arrhythmia');
            $table->boolean('heart_failure');
            $table->boolean('diabetes');
            $table->boolean('depression');
            $table->boolean('dementia');
            $table->boolean('stroke');
            $table->boolean('lung_disease');
            $table->boolean('hypothyroidism');
            $table->string('other_medical_history')->nullable();

            $table->string('anxiolytics');
            $table->string('antidepressants');
            $table->string('induce_sleep_medication');
            $table->string('other_medications');

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
        Schema::dropIfExists('medical_histories');
    }
}

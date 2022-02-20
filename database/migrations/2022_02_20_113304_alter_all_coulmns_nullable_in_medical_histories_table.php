<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAllCoulmnsNullableInMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_histories', function (Blueprint $table) {
            $table->boolean('smoker')->nullable()->change();
            $table->boolean('alcohol_with_dinner')->nullable()->change();

            $table->boolean('high_blood_pressure')->nullable()->change();
            $table->boolean('myocardial_infarction')->nullable()->change();
            $table->boolean('coronary_artery_disease')->nullable()->change();
            $table->boolean('arrhythmia')->nullable()->change();
            $table->boolean('heart_failure')->nullable()->change();
            $table->boolean('diabetes')->nullable()->change();
            $table->boolean('depression')->nullable()->change();
            $table->boolean('dementia')->nullable()->change();
            $table->boolean('stroke')->nullable()->change();
            $table->boolean('lung_disease')->nullable()->change();
            $table->boolean('hypothyroidism')->nullable()->change();

            $table->boolean('anxiolytics')->nullable()->change();
            $table->boolean('antidepressants')->nullable()->change();
            $table->boolean('induce_sleep_medication')->nullable()->change();
            $table->boolean('other_medications')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medical_histories', function (Blueprint $table) {
            $table->boolean('smoker')->nullable(false)->change();
            $table->boolean('alcohol_with_dinner')->nullable(false)->change();

            $table->boolean('high_blood_pressure')->nullable(false)->change();
            $table->boolean('myocardial_infarction')->nullable(false)->change();
            $table->boolean('coronary_artery_disease')->nullable(false)->change();
            $table->boolean('arrhythmia')->nullable(false)->change();
            $table->boolean('heart_failure')->nullable(false)->change();
            $table->boolean('diabetes')->nullable(false)->change();
            $table->boolean('depression')->nullable(false)->change();
            $table->boolean('dementia')->nullable(false)->change();
            $table->boolean('stroke')->nullable(false)->change();
            $table->boolean('lung_disease')->nullable(false)->change();
            $table->boolean('hypothyroidism')->nullable(false)->change();

            $table->boolean('anxiolytics')->nullable(false)->change();
            $table->boolean('antidepressants')->nullable(false)->change();
            $table->boolean('induce_sleep_medication')->nullable(false)->change();
            $table->boolean('other_medications')->nullable(false)->change();
        });
    }
}

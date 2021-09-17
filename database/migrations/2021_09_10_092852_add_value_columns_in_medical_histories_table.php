<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValueColumnsInMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_histories', function (Blueprint $table) {
            $table->unsignedInteger('alcohol_with_dinner_quantity')->after('alcohol_with_dinner')->default(0);

            $table->string('anxiolytics_value')->after('anxiolytics')->nullable();
            $table->string('antidepressants_value')->after('antidepressants')->nullable();
            $table->string('induce_sleep_medication_value')->after('induce_sleep_medication')->nullable();
            $table->string('other_medications_value')->after('other_medications')->nullable();
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
            $table->dropColumn([
                'alcohol_with_dinner_quantity',

                'anxiolytics_value',
                'antidepressants_value',
                'induce_sleep_medication_value',
                'other_medications_value',
            ]);
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAllCoulmnsNullableInClinicalExplorationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinical_explorations', function (Blueprint $table) {
            $table->boolean('cpap')->nullable()->change();
            $table->boolean('mandibular_advancement_device')->nullable()->change();
            $table->boolean('positional_therapy')->nullable()->change();
            $table->boolean('upper_airway_surgery')->nullable()->change();
            $table->boolean('bariatric_surgery')->nullable()->change();

            $table->boolean('bruxism')->nullable()->change();
            $table->boolean('pointed_hard_palade')->nullable()->change();
            $table->boolean('tmj_noise')->nullable()->change();
            $table->boolean('tmj_pain')->nullable()->change();
            $table->boolean('bilateral_crossbite')->nullable()->change();
            $table->boolean('lateral_crossbite')->nullable()->change();

            $table->decimal('height')->nullable()->change();
            $table->decimal('weight')->nullable()->change();
            $table->decimal('bmi')->nullable()->change();
            $table->decimal('neck_circumference')->nullable()->change();

            $table->string('mallampati_classification')->nullable()->change();
            $table->string('tonsil_classification')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clinical_explorations', function (Blueprint $table) {
            $table->boolean('cpap')->nullable(false)->change();
            $table->boolean('mandibular_advancement_device')->nullable(false)->change();
            $table->boolean('positional_therapy')->nullable(false)->change();
            $table->boolean('upper_airway_surgery')->nullable(false)->change();
            $table->boolean('bariatric_surgery')->nullable(false)->change();
            $table->boolean('bruxism')->nullable(false)->change();
            $table->boolean('pointed_hard_palade')->nullable(false)->change();
            $table->boolean('tmj_noise')->nullable(false)->change();
            $table->boolean('tmj_pain')->nullable(false)->change();
            $table->boolean('bilateral_crossbite')->nullable(false)->change();
            $table->boolean('lateral_crossbite')->nullable(false)->change();
            $table->decimal('height')->nullable(false)->change();
            $table->decimal('weight')->nullable(false)->change();
            $table->decimal('bmi')->nullable(false)->change();
            $table->decimal('neck_circumference')->nullable(false)->change();

            $table->string('mallampati_classification')->nullable(false)->change();
            $table->string('tonsil_classification')->nullable(false)->change();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalExplorationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinical_explorations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained('assessments');
            $table->boolean('cpap');
            $table->boolean('mandibular_advancement_device');
            $table->boolean('positional_therapy');
            $table->string('upper_airway_surgery');
            $table->string('other_upper_airway_surgery')->nullable();
            $table->boolean('bariatric_surgery');
            $table->string('other_treatments_for_sleep_apnea')->nullable();

            $table->boolean('bruxism');
            $table->boolean('pointed_hard_palade');
            $table->boolean('tmj_noise');
            $table->boolean('tmj_pain');
            $table->boolean('bilateral_crossbite');
            $table->boolean('lateral_crossbite');

            $table->decimal('height');
            $table->decimal('weight');
            $table->decimal('bmi');
            $table->decimal('neck_circumference');

//            $table->boolean('normognathic');
//            $table->boolean('retrognathic');
//            $table->boolean('prognathic');
//
//            $table->boolean('edge_to_edge_bite');
//            $table->boolean('anterior_crossbite');
//            $table->boolean('overbite');
//
//            $table->boolean('total_visibility_of_tonsils_uvula_soft_palate');
//            $table->boolean('hard_and_soft_palate_visibility');
//            $table->boolean('hard_and_palate_and_part_of_soft_palate_visibility');
//            $table->boolean('only_hard_palate_visibility');

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
        Schema::dropIfExists('clinical_explorations');
    }
}

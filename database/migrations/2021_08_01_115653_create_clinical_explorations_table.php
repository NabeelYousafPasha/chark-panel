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
            $table->enum('upper_airway_surgery', array_keys(config('constants.upper_airway_surgery')));
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
            $table->decimal('beats_per_minute');
            $table->decimal('systolic_blood_pressure');
            $table->decimal('diastolic_blood_pressure');

            $table->boolean('normognaithic');
            $table->boolean('retrognathico');
            $table->boolean('prognathic');

            $table->boolean('edge_to_edge_bite');
            $table->boolean('anterior_crossbite');
            $table->boolean('overbite');

            $table->boolean('total_visibility_of_tonsils_uvula_soft_palate');
            $table->boolean('visibility_of_hard_and_soft_palate_upper_position_of_tonsils_and_uvula');
            $table->boolean('visibility_of_hard_and_palate_and_part_of_soft_palate_above_uvula');
            $table->boolean('visibility_only_of_hard_palate');

            $table->longText('assessment_observation')->nullable();
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

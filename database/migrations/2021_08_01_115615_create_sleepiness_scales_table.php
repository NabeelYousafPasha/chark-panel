<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSleepinessScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sleepiness_scales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained('assessments');
            $table->enum('while_sitting_and_reading', array_keys(config('constants.sleepiness_scale_options')));
            $table->enum('while_watching_television', array_keys(config('constants.sleepiness_scale_options')));
            $table->enum('while_inactive_in_public_place', array_keys(config('constants.sleepiness_scale_options')));
            $table->enum('while_travelling', array_keys(config('constants.sleepiness_scale_options')));
            $table->enum('while_laying_down_in_afternoon', array_keys(config('constants.sleepiness_scale_options')));
            $table->enum('while_talking', array_keys(config('constants.sleepiness_scale_options')));
            $table->enum('while_sitting_after_lunch', array_keys(config('constants.sleepiness_scale_options')));
            $table->enum('while_driving', array_keys(config('constants.sleepiness_scale_options')));
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
        Schema::dropIfExists('sleepness_scales');
    }
}

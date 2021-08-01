<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSymptomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symptoms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained('assessments');
            $table->boolean('snore');
            $table->boolean('apnea');
            $table->boolean('breathing_shortness');
            $table->decimal('average_sleep');
            $table->boolean('fragmented_sleep');
            $table->boolean('nocturia');
            $table->boolean('tired_during_day');
            $table->boolean('morning_headache');
            $table->boolean('nap');
            $table->enum('night_snoring_experience', array_keys(config('constants.night_snoring_experience')));
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
        Schema::dropIfExists('symptoms');
    }
}

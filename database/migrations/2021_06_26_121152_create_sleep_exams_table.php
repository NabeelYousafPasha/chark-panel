<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSleepExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sleep_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_information_id')->constrained('patient_information');
            $table->boolean('snore');
            $table->boolean('tired');
            $table->boolean('stop_breathing');
            $table->boolean('high_blood_pressure');
            $table->foreignId('created_by')->constrained('users');
            $table->softDeletes();
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
        Schema::dropIfExists('sleep_exams');
    }
}

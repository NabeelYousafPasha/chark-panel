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
            $table->foreignId('patient_information_id')->constrained('patient_information');
            $table->boolean('insomnia');
            $table->boolean('blood_pressure');
            $table->boolean('stroke');
            $table->boolean('heart_attack');
            $table->boolean('atrial_fibrillation');
            $table->boolean('diabetes');
            $table->boolean('gerd');
            $table->boolean('anxiety');
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
        Schema::dropIfExists('medical_histories');
    }
}

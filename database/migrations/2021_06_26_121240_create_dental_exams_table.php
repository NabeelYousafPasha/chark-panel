<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentalExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dental_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_information_id')->constrained('patient_information');
            $table->boolean('scalloped_tongue');
            $table->boolean('bruxism');
            $table->boolean('tooth_wear');
            $table->string('mallampati_classification');
            $table->string('tonsil_classification');
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
        Schema::dropIfExists('dental_exams');
    }
}

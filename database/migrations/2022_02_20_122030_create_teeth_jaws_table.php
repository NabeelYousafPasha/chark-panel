<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeethJawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teeth_jaws', function (Blueprint $table) {
            $table->id();
            $table->string('tooth_name');
            $table->string('type');
            $table->boolean('jaw');
            $table->unsignedInteger('position');
            $table->string('image');
            $table->unsignedInteger('order');
            $table->foreignId('created_by')->constrained('users');
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
        Schema::dropIfExists('teeth_jaws');
    }
}

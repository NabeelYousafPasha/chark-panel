<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAllCoulmnsNullableInSymptomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('symptoms', function (Blueprint $table) {
            $table->boolean('snore')->nullable()->change();
            $table->boolean('apnea')->nullable()->change();
            $table->boolean('breathing_shortness')->nullable()->change();
            $table->decimal('average_sleep')->nullable()->change();
            $table->boolean('fragmented_sleep')->nullable()->change();
            $table->boolean('nocturia')->nullable()->change();
            $table->boolean('tired_during_day')->nullable()->change();
            $table->boolean('morning_headache')->nullable()->change();
            $table->boolean('nap')->nullable()->change();
            $table->boolean('sleepiness_during_day')->nullable()->change();
            $table->boolean('loss_of_concentration')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('symptoms', function (Blueprint $table) {
            $table->boolean('snore')->nullable(false)->change();
            $table->boolean('apnea')->nullable(false)->change();
            $table->boolean('breathing_shortness')->nullable(false)->change();
            $table->decimal('average_sleep')->nullable(false)->change();
            $table->boolean('fragmented_sleep')->nullable(false)->change();
            $table->boolean('nocturia')->nullable(false)->change();
            $table->boolean('tired_during_day')->nullable(false)->change();
            $table->boolean('morning_headache')->nullable(false)->change();
            $table->boolean('nap')->nullable(false)->change();
            $table->boolean('sleepiness_during_day')->nullable(false)->change();
            $table->boolean('loss_of_concentration')->nullable(false)->change();
        });
    }
}

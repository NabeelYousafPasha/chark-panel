<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInClinicalExplorationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinical_explorations', function (Blueprint $table) {
            $table->string('mallampati_classification')->after('neck_circumference');
            $table->string('tonsil_classification')->after('mallampati_classification');
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
            $table->dropColumn([
                'mallampati_classification',
                'tonsil_classification',
            ]);
        });
    }
}

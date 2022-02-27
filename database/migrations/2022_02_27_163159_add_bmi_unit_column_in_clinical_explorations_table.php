<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBmiUnitColumnInClinicalExplorationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinical_explorations', function (Blueprint $table) {
            $table->unsignedInteger('bmi_unit')->after('bmi')->nullable();
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
            $table->dropColumn('bmi_unit');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPatientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->date('birthdate')->nullable()->change();
            $table->string('name_mother')->nullable()->change();
            $table->string('cns')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->date('birthdate')->nullable(false)->change();
            $table->string('name_mother')->nullable(false)->change();
            $table->string('cns')->nullable(false)->change();
        });
    }
}

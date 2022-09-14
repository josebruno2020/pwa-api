<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePatientStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_statuses', function (Blueprint $table) {
            $table->string('destiny')->nullable();
            $table->integer('status_to')->nullable(true)->change();
            $table->boolean('is_alta')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_statuses', function (Blueprint $table) {
            $table->integer('status_to')->nullable(false)->change();
            $table->dropColumn(['is_alta', 'destiny']);
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntoxicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intoxications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('user_id')->unsigned();

            //----
            $table->string('_01', 50)->nullable();
            $table->string('_02', 50)->nullable();
            $table->string('_03', 50)->nullable();
            $table->string('_04', 50)->nullable();
            $table->string('_05', 50)->nullable();
            $table->string('_0505', 50)->nullable();
            $table->string('_06', 50)->nullable();
            $table->string('_0605', 50)->nullable();
            $table->string('_07', 50)->nullable();
            $table->string('_08', 50)->nullable();
            $table->string('_09', 50)->nullable();
            $table->string('_10', 50)->nullable();
            $table->string('_1005', 50)->nullable();
            $table->string('_11', 50)->nullable();
            $table->string('_12', 50)->nullable();
            $table->string('_13', 50)->nullable();
            $table->string('_14', 50)->nullable();
            $table->string('_15', 50)->nullable();
            $table->string('_16', 50)->nullable();
            $table->string('_17', 50)->nullable();
            $table->string('_18', 50)->nullable();
            $table->string('_1805', 50)->nullable();
            $table->string('_19', 50)->nullable();
            $table->string('_20', 50)->nullable();
            $table->string('_21', 50)->nullable();
            $table->string('_2105', 50)->nullable();
            $table->string('_22', 50)->nullable();
            $table->string('_23', 50)->nullable();
            $table->string('_24', 50)->nullable();
            $table->string('_25', 50)->nullable();
            $table->string('_26', 50)->nullable();
            $table->string('_27', 50)->nullable();
            $table->string('_28', 50)->nullable();
            $table->string('_29', 50)->nullable();
            $table->string('_30', 50)->nullable();
            $table->string('_31', 50)->nullable();
            $table->string('_32', 50)->nullable();
            $table->string('_33', 50)->nullable();
            $table->string('_3305', 50)->nullable();
            $table->string('_34', 50)->nullable();
            $table->string('_3405', 50)->nullable();
            $table->string('_35', 50)->nullable();
            $table->string('_36', 50)->nullable();
            $table->string('_37', 50)->nullable();
            $table->string('_38', 50)->nullable();
            $table->string('_3805', 50)->nullable();
            $table->string('_39', 100)->nullable();
            $table->string('_40', 50)->nullable();
            $table->string('_41', 50)->nullable();
            $table->string('_42', 50)->nullable();
            $table->string('_43', 50)->nullable();
            $table->string('_44', 50)->nullable();
            $table->string('_45', 50)->nullable();
            $table->string('_46', 50)->nullable();
            $table->string('_47', 50)->nullable();
            $table->string('_48', 50)->nullable();
            $table->string('_49', 50)->nullable();
            $table->string('_4905', 50)->nullable();
            $table->string('_50', 50)->nullable();
            $table->string('_5005', 50)->nullable();
            $table->string('_51', 50)->nullable();
            $table->string('_52', 50)->nullable();
            $table->string('_53', 50)->nullable();
            $table->string('_54', 50)->nullable();
            $table->string('_55', 50)->nullable();
            $table->string('_56', 100)->nullable();
            $table->string('_57', 100)->nullable();
            $table->string('_58', 100)->nullable();
            $table->string('_5805', 50)->nullable();
            $table->string('_59', 100)->nullable();
            $table->string('_60', 50)->nullable();
            $table->string('_61', 100)->nullable();
            $table->string('_62', 50)->nullable();
            $table->string('_63', 50)->nullable();
            $table->string('_6305', 50)->nullable();
            $table->string('_64', 50)->nullable();
            $table->string('_6405', 50)->nullable();
            $table->string('_65', 100)->nullable();
            $table->string('_66', 50)->nullable();
            $table->string('_6605', 50)->nullable();
            $table->string('_67', 50)->nullable();
            $table->string('_68', 50)->nullable();
            $table->string('_69', 50)->nullable();
            $table->string('_70', 50)->nullable();
            $table->string('_71', 50)->nullable();

            //----

            $table->string('obs', 500)->nullable();

            $table->string('city', 50)->nullable();
            $table->string('code', 50)->nullable();
            $table->string('function', 50)->nullable();

            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('intoxications');
    }
}

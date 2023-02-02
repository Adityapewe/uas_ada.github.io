<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('registration_code')->unique();
            $table->date('tglundian');
            $table->bigInteger('noundian');
            $table->string('name');
            $table->date('birthdate');
            $table->string('gender');
            $table->unsignedBigInteger('polyclinic_id');
            $table->unsignedBigInteger('doctor_id');
            $table->timestamps();
            $table->foreign('polyclinic_id')->references('id')->on('polyclinics')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('patient_id');
            $table->tinyInteger('diabetic_status')->default(0);
            $table->tinyInteger('eye_site_status')->default(0);
            $table->tinyInteger('heart_deases')->default(0);
            $table->tinyInteger('allergy')->default(0);
            $table->tinyInteger('gastric')->default(0);
            $table->text('note');
            $table->timestamps();


            $table->foreign('patient_id')->references('id')->on('patients');
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

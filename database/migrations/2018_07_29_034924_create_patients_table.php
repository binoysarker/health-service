<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->char('full_name',100);
            $table->unsignedInteger('mobile_number');
            $table->date('date_of_birth');
            $table->char('gender',8);
            $table->decimal('height');
            $table->decimal('weight');
            $table->char('blood_group',5);
            $table->text('address');
            $table->string('email',100);
            $table->string('password');
            $table->char('user_name',20);
            $table->char('occupation',55);
            $table->string('photo_url');
            $table->tinyInteger('donate_blood');
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
        Schema::dropIfExists('patients');
    }
}

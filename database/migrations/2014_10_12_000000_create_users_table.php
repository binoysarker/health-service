<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('mobile_number');
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->char('gender',8);
            $table->decimal('height');
            $table->decimal('weight');
            $table->char('blood_group',5);
            $table->text('address');
            $table->char('occupation',55);
            $table->string('photo_url');
            $table->tinyInteger('blood_donate_status')->default(0);
            $table->tinyInteger('admin_status')->default(0);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

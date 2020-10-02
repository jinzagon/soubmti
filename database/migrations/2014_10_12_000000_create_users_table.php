<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('annee')->nullable();
            $table->string('filliere')->nullable();
            $table->string('avatar')->default('uploads/avatars/default.jpg');
            $table->boolean('admin')->default(0);
            $table->string('bio')->nullable();

            $table->string('m1')->nullable();
            $table->string('m1c1')->nullable();
            $table->string('m1c2')->nullable();
            $table->string('m1ef')->nullable();
            $table->string('m2')->nullable();
            $table->string('m2c1')->nullable();
            $table->string('m2c2')->nullable();
            $table->string('m2ef')->nullable();
            $table->string('m3')->nullable();
            $table->string('m3c1')->nullable();
            $table->string('m3c2')->nullable();
            $table->string('m3ef')->nullable();




            $table->date('dob')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
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

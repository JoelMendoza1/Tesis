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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->String('identificationCard',10)->unique();
            $table->string('telephoneNumber',10);
            $table->string('address');
            $table->string('dateOfBirth');
            $table->string('career')->nullable();
            $table->string('institution');
            $table->string('semester')->nullable();
            $table->string('totalSemestrerCarrer')->nullable();
            $table->boolean('request')->nullable();
            $table->text('descriptionRequest')->nullable();
            $table->string('typeUser',1);
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

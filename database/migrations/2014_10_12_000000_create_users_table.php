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
            $table->string('identification_id')->nullable()->unique;
            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('direction')->nullable();
            $table->string('fileName')->nullable();
            $table->string('path')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('state')->nullable();
            $table->boolean('showCurriculum')->nullable()->default(0);;
            $table->string('avatar')->nullable();
            $table->string('external_id')->nullable();
            $table->timestamp('last_sign_in_at')->nullable();
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

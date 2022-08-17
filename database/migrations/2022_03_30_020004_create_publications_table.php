<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('category_publication_id')->nullable();
            $table->foreign('category_publication_id')->references('id')->on('category_publications');
            $table->string('title_publication',50)->nullable(false);
            $table->string('text_publication',255)->nullable(false);
            $table->string('fileName_publication')->nullable();
            $table->string('path_publication')->nullable();
            $table->date('init_date_publication');
            $table->date('end_date_publication');
            $table->boolean('hidden')->nullable()->default(0);
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
        Schema::dropIfExists('publications');
    }
}

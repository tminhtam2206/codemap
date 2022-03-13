<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('title_slug', 180);
            $table->string('thumb', 255);
            $table->string('cover', 255)->nullable();
            $table->text('content')->nullable();
            $table->string('video', 255)->nullable();
            $table->bigInteger('user_id');
            $table->integer('views')->default(0);
            $table->integer('downloads')->default(0);
            $table->string('delete', 1)->default('N');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

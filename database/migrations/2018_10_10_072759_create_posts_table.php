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
            $table->increments('id');
            $table->string('song_name');
            $table->integer('artist_id');
            $table->integer('gain');
            $table->integer('treble');
            $table->integer('bass');
            $table->integer('middle');
            $table->integer('delay');
            $table->integer('distortion');
            $table->integer('tremolo');
            $table->integer('flanger');
            $table->integer('phazer');
            $table->integer('user_id');
            $table->float('rating');
            $table->timestamps();
            $table->rememberToken();
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

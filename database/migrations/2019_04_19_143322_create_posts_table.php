<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->mediumIncrements('id');
            $table->string('title', 100);
            $table->string('description')->nullable();
            $table->text('content');
            $table->string('image');
            $table->unsignedTinyInteger('category_id');
            $table->tinyInteger('days')->unsigned();
            $table->tinyInteger('nights')->unsigned();
            $table->decimal('price')->unsigned();
            $table->boolean('flight');
            $table->boolean('hot')->default(0);
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
}

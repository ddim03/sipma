<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id'); // Menggunakan 'post_id' sebagai primary key
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('admin_id');
            $table->string('title');
            $table->string('slug');
            $table->string('banner');
            $table->text('deskripsi');
            $table->date('published_at');
            $table->boolean('is_validated')->default(false);
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('categories');

            // Mengganti foreign key constraint untuk 'admin_id'
            $table->foreign('admin_id')->references('admin_id')->on('admin');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

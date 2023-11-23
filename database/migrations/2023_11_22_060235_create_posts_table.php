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
            $table->id('id'); // Menggunakan 'post_id' sebagai primary key
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('admin_id');
            $table->string('judul');
            $table->string('slug');
            $table->string('gambar')->nullable();
            $table->text('isi');
            $table->boolean('is_validated')->default(false);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');

            // Mengganti foreign key constraint untuk 'admin_id'
            $table->foreign('admin_id')->references('id')->on('admins');
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

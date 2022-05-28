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
            $table->foreignId('category_id')->nullable();
            $table->foreignId('user_id');
            $table->string("title"); //untuk nama penerima bantuan
            $table->string("image")->nullable();
            $table->string("slug")->unique(); // untuk nik
            $table->text("excert");
            $table->text("body"); //untuk keterangan alamat 
            $table->text("keterangan"); //untuk keterangan sudah belum
            $table->text("ewarung"); //untuk keterangan tempat pencairan
            $table->timestamp("pusblished_at")->nullablle();
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('lang', ['ru', 'en', 'ky'])->index();
            $table->integer('priority')->index();
            $table->string('title');
            $table->date('date')->useCurrent();
            $table->mediumText('lid');
            $table->text('content');
            $table->string('image');
            $table->tinyInteger('published');
            $table->tinyInteger('on_main');
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
        Schema::dropIfExists('articles');
    }
}

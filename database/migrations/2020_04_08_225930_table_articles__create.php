<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class TableArticlesCreate extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->unsignedBigInteger('user_id')->nullable();
			$table->unsignedBigInteger('category_id');
			$table->string('title');
			$table->string('banner');
			$table->text('article');
			$table->enum('publish', \App\Article::PUBLISH)->default(\App\Article::PUBLISH_N);
			$table->softDeletes();
			$table->timestamps();


			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('set null')
				->onUpdate('cascade');


			$table->foreign('category_id')
				->references('id')
				->on('categories')
				->onDelete('cascade')
				->onUpdate('cascade');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateVideosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->unsignedBigInteger('user_id')->nullable();
			$table->unsignedBigInteger('category_id');
			$table->unsignedBigInteger('course_id');
			$table->string('slug');
			$table->string('video');
			$table->string('title');
			$table->string('duration')->nullable();
			$table->string('banner')->nullable();
			$table->text('info')->nullable();
			$table->enum('publish', \App\Video::PUBLISH)->default(\App\Video::PUBLISH_N);
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

			$table->foreign('course_id')
				->references('id')
				->on('courses')
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
		Schema::dropIfExists('uploads');
	}
}

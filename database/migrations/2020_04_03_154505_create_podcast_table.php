<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePodcastTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('podcasts', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->unsignedBigInteger('category_id');
			$table->string('title', '255');
			$table->string('podcast');
			$table->string('banner');
			$table->string('duration')->nullable();
			$table->enum('publish', \App\Podcast::PUBLISH)->default(\App\Podcast::PUBLISH_N);
			$table->text('info')->nullable();
			$table->timestamps();

			$table->foreign('category_id')
				->references('id')
				->on('categories')
				->onUpdate('cascade')
				->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('podcast');
	}
}

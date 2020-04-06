<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSlideTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slide', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('title', 255);
			$table->string('link', 255);
			$table->enum('published', \App\Slide::PUBLISH)->default(\App\Slide::PUBLISH_N);
			$table->string('image', 255);
			$table->timestamp('expired_at');
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
		Schema::dropIfExists('slide');
	}
}

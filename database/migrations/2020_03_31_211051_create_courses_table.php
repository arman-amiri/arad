<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCoursesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->unsignedBigInteger('category_id');
			$table->string('title', '255');
			$table->string('price', '100')->default('0');
			$table->string('teacher_name', '255')->default('unknown');
			$table->string('banner')->nullable();
			$table->enum('publish', \App\Course::PUBLISH)->default(\App\Course::PUBLISH_N);
			$table->enum('type_holding', \App\Course::TYPE_HOLDING)->default(\App\Course::TYPE_HOLDING_VIRTUAL);
			$table->text('info')->nullable();
			$table->softDeletes();
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
		Schema::dropIfExists('virtual_course');
	}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{

			$table->bigIncrements('id');
			$table->string('email', 100)->unique()->nullable();
			$table->string('mobile', 14)->unique()->nullable();
			$table->string('name')->nullable();
			$table->string('password', 100)->nullable();
			$table->enum('type', \App\User::TYPES)->default(\App\User::TYPE_USER);
			$table->string('avatar', 100)->nullable();
			$table->string('verify_code', 6)->nullable();
			$table->timestamp('verified_at')->nullable();
			$table->timestamp('expired_at')->nullable();
			$table->softDeletes();
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
		Schema::dropIfExists('users');
	}
}

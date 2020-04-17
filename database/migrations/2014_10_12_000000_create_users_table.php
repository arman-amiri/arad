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
			$table->string('mobile', 14)->unique();
			$table->string('name');
			$table->string('password', 100);
			$table->enum('level', \App\User::LEVELS)->default(\App\User::LEVEL_USER);
			$table->enum('active', \App\User::ACTIVES)->default(\App\User::ACTIVE_YES);
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

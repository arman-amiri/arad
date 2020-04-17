<?php

use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->createAdminUser();

		$this->createUser();
	}



	private function createAdminUser()
	{
		factory(\App\User::class)->create([

			'name'       => 'ادمین سایت',
			'level'       => \App\User::LEVEL_ADMIN,
			'email'      => 'admin@arad.com',
			'mobile'     => '+9809338057197',
			'expired_at' => '2025-04-17 14:37:34',

		]);
		$this->command->info('admin created');
	}



	private function createUser()
	{
		factory(\App\User::class)->create([

			'name'       => 'کاربر 1',
			'email'      => 'user@arad.com',
			'mobile'     => '+9809338150197',
			'expired_at' => '2025-04-17 14:37:34',
		]);
		$this->command->info('user created');
	}
}

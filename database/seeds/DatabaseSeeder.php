<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class)->create(
        	[
        	'email'=>'test@test.com',
        	'name'=>'user1']
        );

        factory(User::class)->create(
        	[
        	'email'=>'test2@test.com',
        	'name'=>'user2']
        );
        factory(User::class)->create(
        	[
        	'email'=>'test3@test.com',
        	'name'=>'user3']
        );
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        DB::table('users')->delete();
	    User::create(array(
	        'name'     		=> 'admin',
	        'email'    		=> 'admin@admin.com',
	        'user_type'		=> 'admin',
	        'password' 		=> Hash::make('admin@123'),
	        'remember_token'=> str_random(10),
	    ));
    }
}

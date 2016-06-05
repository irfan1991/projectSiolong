<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
        //
        	DB::table('roles')->delete();
        	// Membuat role admin
		$adminRole = new Role();
		$adminRole->name = "admin";
		$adminRole->display_name = "Admin";
		$adminRole->save();
	
		// Membuat role member
$memberRole = new Role();
$memberRole->name = "member";
$memberRole->display_name = "Member";
$memberRole->save();


		DB::table('users')->delete();

		// Membuat sample admin
		$admin = new User();
		$admin->name = 'Admin Siolong';
		$admin->email = 'asisten91@gmail.com';
		$admin->username= 'admin';
		$admin->addres = 'pondok labu';
		$admin->city = 'jakarta selatan';
		$admin->country ='indonesia';
		$admin->image ='irfan.jpg';
		$admin->password = bcrypt('rahasia');
		$admin->role = 'admin';
		$admin->save();
		$admin->attachRole($adminRole);
        	// sample admin

		
			
}
}
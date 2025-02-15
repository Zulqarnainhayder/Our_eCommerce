<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Profile;
class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
        	'name' => 'customer',
        	'description' => ' Customer Role'
        ]);

        $role = Role::create([
        	'name' => 'admin',
        	'description' => 'Admin Role'
        ]);

        $user = User::create([
        	'email' => 'iamadmin@admin.com',
        	'password' => bcrypt('hudabiaStore'),
        	'role_id' => $role->id,
        ]);

        Profile::create([
        	'user_id' => $user->id
        ]);
    }
}

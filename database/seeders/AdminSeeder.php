<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','Administrator')->first();

        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('12345678');
        $admin->phone  = '08131219734';
        $admin->address = '45, Kings Road';
        $admin->save();

        $admin->roles()->attach($role_user);
    }
}

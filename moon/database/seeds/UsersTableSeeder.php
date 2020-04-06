<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // DB::table('role_user')->truncate();

        $devRole = Role::where('name', 'dev')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $driverRole = Role::where('name', 'driver')->first();
        $userRole = Role::where('name', 'user')->first();

        $dev = User::create([
            'name' => 'Jon Teves',
            'email' => 'massiveware@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $driver = User::create([
            'name' => 'Driver User',
            'email' => 'driver@driver.com',
            'password' => Hash::make('password'),
        ]);
        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
        ]);

        $dev->roles()->attach($devRole);
        $admin->roles()->attach($adminRole);
        $driver->roles()->attach($driverRole);
        $user->roles()->attach($userRole);
    }
}

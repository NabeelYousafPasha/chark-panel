<?php

use App\Models\Permission;
use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = 'qwerty!123';

        $users = [
            array(
                'first_name' => 'Admin',
                'last_name' => 'Chark Education',
                'phone' => '+923215031089',
                'username' => 'admin@charkeducation.com',
                'email' => 'admin@charkeducation.com',
                'address' => 'PAK',
                'city' => 'RWP',
                'postal_code' => '46000',
                'country_id' => '1',
                'email_verified_at' => now(),
            ),
            array(
                'first_name' => 'Developer',
                'last_name' => 'Chark Education',
                'phone' => '+923215031089',
                'username' => 'nabeelyousafpasha@gmail.com',
                'email' => 'nabeelyousafpasha@gmail.com',
                'address' => 'PAK',
                'city' => 'RWP',
                'postal_code' => '46000',
                'country_id' => '1',
                'email_verified_at' => now(),
            ),
            array(
                'first_name' => 'Kiran',
                'last_name' => 'Rubab',
                'phone' => '+923215031089',
                'username' => 'kiranrubab24@gmail.com',
                'email' => 'kiranrubab24@gmail.com',
                'address' => 'PAK',
                'city' => 'RWP',
                'postal_code' => '46000',
                'country_id' => '1',
                'email_verified_at' => now(),
            ),
        ];

        foreach ($users as $user) {
            $user = User::firstOrCreate([
                'username' => $user['username'],
                'email' => $user['email'],
            ],[
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'password' => bcrypt($password),
                'phone' => $user['phone'],
                'address' => $user['address'],
                'city' => $user['city'],
                'postal_code' => $user['postal_code'],
                'country_id' => DB::table('countries')->where('code', '=', 'PK')->first()->id ?? 0,
                'email_verified_at' => $user['email_verified_at'],
            ]);

            $user->assignRole(Role::ADMIN);
        }


        $adminRole = Role::where('name', '=', Role::ADMIN)->first();
        $adminRole->givePermissionTo(Permission::all());
    }
}

<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            array('name' => Role::ADMIN),
            array('name' => Role::USER),
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }
    }
}

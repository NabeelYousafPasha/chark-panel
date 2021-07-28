<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operations = ['create', 'view', 'update', 'delete'];
        $entities = [
            'permission_role',
            'user',
            'patient',
        ];

        $permission_iterations = [];
        foreach ($entities as $entity_key => $entity) {
            foreach ($operations as $operation_key => $operation) {
                $permission_iterations[$entity_key][$operation_key]['name'] = $operation.'_'.$entity;
                $permission_iterations[$entity_key][$operation_key]['guard_name'] = 'web';
            }
        }

        foreach ($permission_iterations as $permissions) {
            foreach ($permissions as $permission) {
                Permission::firstOrCreate($permission);
            }
        }


        // only view permissions
        $operations = ['view',];
        $entities = ['home', 'dashboard',];

        foreach ($entities as $entity) {
            foreach ($operations as $operation) {
                Permission::firstOrCreate([
                    'name' => $operation.'_'.$entity,
                    'guard_name' => 'web',
                ]);
            }
        }
    }
}

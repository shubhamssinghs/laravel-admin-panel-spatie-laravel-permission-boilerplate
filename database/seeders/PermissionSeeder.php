<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'browse_roles',
            'view_roles',
            'create_roles',
            'edit_roles',
            'delete_roles',
            'browse_permissions',
            'view_permissions',
            'create_permissions',
            'edit_permissions',
            'delete_permissions',
            'browse_users',
            'view_users',
            'create_users',
            'edit_users',
            'delete_users',
        ];

        foreach($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

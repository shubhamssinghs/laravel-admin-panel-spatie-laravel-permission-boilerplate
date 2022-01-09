<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'browse_users',
            'view_users',
            'create_users',
            'edit_users',
            'delete_users',
        ];

        $role = Role::where('name','admin')->first();
        $role->syncPermissions($permissions);

    }
}

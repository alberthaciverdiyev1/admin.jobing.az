<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'create_users',
            'read_users',
            'update_users',
            'delete_users',
            'view_users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $developerRole = Role::firstOrCreate(['name' => 'developer']);
        $userRole = Role::firstOrCreate(['name' => 'user']);


        $adminRole->givePermissionTo(Permission::all());
        $developerRole->givePermissionTo(Permission::all());


        echo "Roles and permissions created successfully.\n";
    }
}

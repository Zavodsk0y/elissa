<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $employee = Role::create(['name' => 'employee']);
        $admin = Role::create(['name' => 'admin']);
        $authUser = Role::create(['name' => 'authenticated user']);

        $arrayOfPermissionNames = [
            // authenticated user permissions
            'cart interaction',
            'order interaction',
            'request interaction',

            // employee permissions (also interactions)
            'news add',
            'news update',
            'news delete',

            'category add',
            'category update',
            'category delete',

            'part add',
            'part update',
            'part delete',

            'service add',
            'service update',
            'service delete',

            'order status update',

            'request status update',

            // admin permissions (also employee permissions)
            'show users',
            'assign employee',
            'unsign employee',
            'history interaction'
        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });
        Permission::insert($permissions->toArray());

        $authUserPermissions = ['cart interaction', 'order interaction', 'request interaction'];
        foreach ($authUserPermissions as $item) {
            $authUser->givePermissionTo($item);
        }

        $employeePermissions = [
            'news add',
            'news update',
            'news delete',
            'category add',
            'category update',
            'category delete',
            'part add',
            'part update',
            'part delete',
            'service add',
            'service update',
            'service delete',
            'order status update',
            'request status update',
        ];
        foreach ($employeePermissions as $item) {
            $employee->givePermissionTo($item);
        }

        $adminPermissions = ['show users', 'assign employee', 'unsign employee', 'history interaction'];
        foreach ($adminPermissions as $item) {
            $admin->givePermissionTo($item);
        }

    }
}

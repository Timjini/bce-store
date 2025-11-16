<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Str;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin Role
        $adminRole = Role::create([
            'id' => (string) Str::uuid(),
            'name' => 'admin',
        ]);

        // Create Permissions
        $permissions = [
            ['controller' => 'UsersController', 'action' => 'index'],
            ['controller' => 'UsersController', 'action' => 'create'],
            ['controller' => 'UsersController', 'action' => 'update'],
            ['controller' => 'UsersController', 'action' => 'delete'],
        ];

        foreach ($permissions as $perm) {
            $permission = Permission::create([
                'id' => (string) Str::uuid(),
                'controller' => $perm['controller'],
                'action' => $perm['action'],
            ]);

            // Attach permission to admin role
            $adminRole->permissions()->attach($permission->id);
        }

        // Assign Admin role to first user (optional)
        $firstUser = User::first();
        if ($firstUser) {
            $firstUser->role_id = $adminRole->id;
            $firstUser->save();
        }
    }
}

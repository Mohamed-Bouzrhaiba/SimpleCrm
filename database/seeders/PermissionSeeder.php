<?php

namespace Database\Seeders;

use App\PermissionEnum;
use App\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>PermissionEnum::MANAGE_USERS->value]);
        Permission::create(['name'=>PermissionEnum::DELETE_PROJECTS->value]);
        Permission::create(['name'=>PermissionEnum::DELETE_CLIENTS->value]);
        Permission::create(['name'=>PermissionEnum::DELETE_TASKS->value]);
        $role = Role::findByName(RoleEnum::ADMIN->value);
        $role->givePermissionTo([
                PermissionEnum::MANAGE_USERS->value,
                PermissionEnum::DELETE_CLIENTS->value,
                PermissionEnum::DELETE_TASKS->value,
                PermissionEnum::DELETE_PROJECTS->value,
        ]);

    }
}

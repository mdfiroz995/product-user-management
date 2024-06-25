<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->permissions()->attach(Permission::all());

        $userRole = Role::create(['name' => 'user']);
        $permission = Permission::where('name','update-profile')->orWhere('name','view-profile')->get();
        $userRole->permissions()->attach($permission);

    }
}

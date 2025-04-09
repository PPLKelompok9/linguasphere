<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissionRole = Role::create([
            'name' => 'admin'
        ]);

        $userPermissionRole = Role::create([
            'name' => 'user'
        ]);

        $agencyPermissionRole = Role::create([
            'name' => 'agency'
        ]);

        $admin = User::create([
            'name' => 'Admin Relingo',
            'email' => 'admin@relingo.com',
            'password' => bcrypt('relingo354')
        ]);
        
        $admin->assignRole($adminPermissionRole);
    }
}

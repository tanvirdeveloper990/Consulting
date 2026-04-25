<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default setting
        Setting::firstOrCreate([
            'header_logo' => ''
        ]);


        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create Super Admin
        $admin = Admin::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // Change it in production
            ]
        );

        // Create super-admin role
        $role = Role::firstOrCreate(
            ['name' => 'super-admin', 'guard_name' => 'admin']
        );

        // Define all permissions
        $permissions = [
            'create dashboard',
            'edit dashboard',
            'view dashboard',
            'delete dashboard',

            // role permissions
            'create role',
            'edit role',
            'view role',
            'delete role',

            // permission permissions
            'create permission',
            'edit permission',
            'view permission',
            'delete permission',


            // user permissions
            'create user',
            'edit user',
            'view user',
            'delete user',


            // setting permissions
            'create setting',
            'edit setting',
            'view setting',
            'delete setting',

            // customer permissions
            'create customer',
            'edit customer',
            'view customer',
            'delete customer',

            
            // project-overview permissions
            'create project-overview',
            'edit project-overview',
            'view project-overview',
            'delete project-overview',
            
            // slider permissions
            'create slider',
            'edit slider',
            'view slider',
            'delete slider',

            // we-are permissions
            'create we-are',
            'edit we-are',
            'view we-are',
            'delete we-are',

            // student-support permissions
            'create student-support',
            'edit student-support',
            'view student-support',
            'delete student-support',

            // mychoose-us permissions
            'create mychoose-us',
            'edit mychoose-us',
            'view mychoose-us',
            'delete mychoose-us',

            // top-study permissions
            'create top-study',
            'edit top-study',
            'view top-study',
            'delete top-study',

            // frequently permissions
            'create frequently',
            'edit frequently',
            'view frequently',
            'delete frequently',

            // moments permissions
            'create moments',
            'edit moments',
            'view moments',
            'delete moments',

            // certificates permissions
            'create certificates',
            'edit certificates',
            'view certificates',
            'delete certificates',

            // university-admission permissions
            'create university-admission',
            'edit university-admission',
            'view university-admission',
            'delete university-admission',

            // our-partner permissions
            'create our-partner',
            'edit our-partner',
            'view our-partner',
            'delete our-partner',

            // review permissions
            'create review',
            'edit review',
            'view review',
            'delete review',

            // country permissions
            'create country',
            'edit country',
            'view country',
            'delete country',


            // study permissions
            'create study',
            'edit study',
            'view study',
            'delete study',

            // category permissions
            'create category',
            'edit category',
            'view category',
            'delete category',

            // blog permissions
            'create blog',
            'edit blog',
            'view blog',
            'delete blog',

            // service-support permissions
            'create service-support',
            'edit service-support',
            'view service-support',
            'delete service-support',

            // applied permissions
            'create applied',
            'edit applied',
            'view applied',
            'delete applied',

            // pages permissions
            'create pages',
            'edit pages',
            'view pages',
            'delete pages',

            // teams permissions
            'create teams',
            'edit teams',
            'view teams',
            'delete teams',

            // career permissions
            'create career',
            'edit career',
            'view career',
            'delete career',


            // category-gallery permissions
            'create category-gallery',
            'edit category-gallery',
            'view category-gallery',
            'delete category-gallery',

            // gallery permissions
            'create gallery',
            'edit gallery',
            'view gallery',
            'delete gallery',



        ];

        // Create and assign permissions to role
        foreach ($permissions as $perm) {
            $permission = Permission::firstOrCreate([
                'name' => $perm,
                'guard_name' => 'admin'
            ]);

            // Assign permission to role if not already assigned
            if (!$role->hasPermissionTo($permission)) {
                $role->givePermissionTo($permission);
            }
        }

        // Assign role to admin
        if (!$admin->hasRole($role)) {
            $admin->assignRole($role);
        }
    }
}

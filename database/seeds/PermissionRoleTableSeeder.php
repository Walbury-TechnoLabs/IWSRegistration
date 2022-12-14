<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $portfolio_permissions = $admin_permissions->filter(function ($permission) {
            return $permission->title != "enrollment_create" && (substr($permission->title, 0, 7) == 'committee_' || substr($permission->title, 0, 11) == 'enrollment_');
        });
        Role::findOrFail(2)->permissions()->sync($portfolio_permissions->pluck('id'));
    }
}

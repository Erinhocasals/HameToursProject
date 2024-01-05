<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  $roleSuperAdmin = Role::create(['name' => 'super-admin']);      // super-administradores
        // $roleAdmin = Role::create(['name' => 'admin']);      // administradores
        // $roleEditor = Role::create(['name' => 'editor']);     // creadores de contenido de hame
        // $roleComercial = Role::create(['name' => 'comercial']);  // comerciales registrados que revenden contenidos
        // $roleAgency = Role::create(['name' => 'agency']);     // las agencias que pueden crear contenidos
        // $roleMessenger = Role::create(['name' => 'messenger']);  // mensajero de las remesas
        // $roleClient = Role::create(['name' => 'client']);     // usuario normal que compra los contenidos
        // $roleBank = Role::create(['name' => 'bank']);     // usuario que deposita dinero para remesas

        // Permission::create(['name' => 'admin.dashboard'])->syncRoles([$roleAdmin, $roleEditor]);

        // Permission::create(['name' => 'admin.user.index'])->syncRoles([$roleAdmin]);
        // Permission::create(['name' => 'admin.user.create'])->syncRoles([$roleAdmin]);
        // Permission::create(['name' => 'admin.user.edit'])->syncRoles([$roleAdmin]);
        // Permission::create(['name' => 'admin.user.destroy'])->syncRoles([$roleAdmin]);

        // Permission::create(['name' => 'admin.category.index'])->syncRoles([$roleAdmin, $roleEditor]);
        // Permission::create(['name' => 'admin.category.create'])->syncRoles([$roleAdmin, $roleEditor]);
        // Permission::create(['name' => 'admin.category.edit'])->syncRoles([$roleAdmin, $roleEditor]);
        // Permission::create(['name' => 'admin.category.destroy'])->syncRoles([$roleAdmin, $roleEditor]);

        // Jetstream::defaultApiTokenPermissions(['read']);
        // Jetstream::role('referer', 'Referer', [
        //     'server:read'
        // ])->description('Referers for HameTours App');

        // $users = User::all();
        // foreach($users as $usr) {
        //     if (count($usr->roles) == 0) {
        //         $usr->assignRole('client');
        //     }
        // }
    }
}

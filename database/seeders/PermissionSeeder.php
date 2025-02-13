<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Dashboard
        $dashboard = Module::updateOrCreate(['name' => 'Dashboard']);
        Permission::updateOrCreate([
            'module_id' => $dashboard->id,
            'name' => 'Lihat',
            'slug' => 'dashboard',
        ]);

        // Settings
        $settings = Module::updateOrCreate(['name' => 'Pengaturan']);
        Permission::updateOrCreate([
            'module_id' => $settings->id,
            'name' => 'Lihat',
            'slug' => 'settings.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $settings->id,
            'name' => 'Edit',
            'slug' => 'settings.update',
        ]);

        // Criteria management
        $criteria = Module::updateOrCreate(['name' => 'Kriteria']);
        Permission::updateOrCreate([
            'module_id' => $criteria->id,
            'name' => 'Lihat',
            'slug' => 'criteria.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $criteria->id,
            'name' => 'Buat',
            'slug' => 'criteria.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $criteria->id,
            'name' => 'Edit',
            'slug' => 'criteria.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $criteria->id,
            'name' => 'Hapus',
            'slug' => 'criteria.destroy',
        ]);

        // SubCriteria Management
        $subcriteria = Module::updateOrCreate(['name'=>'Sub Kriteria']);
        Permission::updateOrCreate([
            'module_id'=>$subcriteria->id,
            'name'=>'Lihat',
            'slug'=>'sub-criteria.index',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$subcriteria->id,
            'name'=>'Tambah',
            'slug'=>'sub-criteria.create',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$subcriteria->id,
            'name'=>'Edit',
            'slug'=>'sub-criteria.edit',
        ]);
        Permission::updateOrCreate([
            'module_id'=>$subcriteria->id,
            'name'=>'Hapus',
            'slug'=>'sub-criteria.destroy',
        ]);

        // Pembobotan Nilai
        $integrity = Module::updateOrCreate(['name' => 'Pembobotan Nilai']);
        Permission::updateOrCreate([
            'module_id' => $integrity->id,
            'name' => 'Lihat',
            'slug' => 'integrity.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $integrity->id,
            'name' => 'Buat',
            'slug' => 'integrity.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $integrity->id,
            'name' => 'Edit',
            'slug' => 'integrity.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $integrity->id,
            'name' => 'Hapus',
            'slug' => 'integrity.destroy',
        ]);

        //evaluation
        $evaluation = Module::updateOrCreate(['name' => 'Penilaian']);
        Permission::updateOrCreate([
            'module_id' => $evaluation->id,
            'name' => 'Lihat',
            'slug' => 'evaluation.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $evaluation->id,
            'name' => 'Buat',
            'slug' => 'evaluation.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $evaluation->id,
            'name' => 'Edit',
            'slug' => 'evaluation.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $evaluation->id,
            'name' => 'Hapus',
            'slug' => 'evaluation.destroy',
        ]);

        // Profile
        $profile = Module::updateOrCreate(['name' => 'Profil']);
        Permission::updateOrCreate([
            'module_id' => $profile->id,
            'name' => 'Edit',
            'slug' => 'profile.update',
        ]);
        Permission::updateOrCreate([
            'module_id' => $profile->id,
            'name' => 'Ganti password',
            'slug' => 'profile.password',
        ]);

        // Backups
        $backup = Module::updateOrCreate(['name' => 'Backup']);
        Permission::updateOrCreate([
            'module_id' => $backup->id,
            'name' => 'Lihat',
            'slug' => 'backups.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $backup->id,
            'name' => 'Buat',
            'slug' => 'backups.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $backup->id,
            'name' => 'Unduh',
            'slug' => 'backups.download',
        ]);
        Permission::updateOrCreate([
            'module_id' => $backup->id,
            'name' => 'Hapus',
            'slug' => 'backups.destroy',
        ]);

        // Role management
        $roles = Module::updateOrCreate(['name' => 'Roles']);
        Permission::updateOrCreate([
            'module_id' => $roles->id,
            'name' => 'Lihat',
            'slug' => 'roles.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $roles->id,
            'name' => 'Buat',
            'slug' => 'roles.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $roles->id,
            'name' => 'Edit',
            'slug' => 'roles.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $roles->id,
            'name' => 'Hapus',
            'slug' => 'roles.destroy',
        ]);

        // User management
        $users = Module::updateOrCreate(['name' => 'Pegawai']);
        Permission::updateOrCreate([
            'module_id' => $users->id,
            'name' => 'Lihat',
            'slug' => 'users.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $users->id,
            'name' => 'Buat',
            'slug' => 'users.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $users->id,
            'name' => 'Edit',
            'slug' => 'users.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $users->id,
            'name' => 'Hapus',
            'slug' => 'users.destroy',
        ]);
    }
}

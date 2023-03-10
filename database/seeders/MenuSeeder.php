<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'main-dashboard',
                'label' => 'Dashboard',
                'icon' => 'bars',
                'category' => '1',
                'type' => 'parent',
                'permission' => 'none'
            ],
            [
                'name' => 'main-livestock',
                'label' => 'Data Ternak',
                'icon' => 'bars',
                'category' => '1',
                'type' => 'single',
                'page_url' => 'livestock.index',
                'permission' => 'livestock.index'
            ],
            [
                'name' => 'setting-account',
                'label' => 'Akun Karyawan',
                'icon' => 'bars',
                'category' => '2',
                'type' => 'single',
                'page_url' => 'account.index',
                'permission' => 'account.index'
            ],
            [
                'name' => 'setting-profile',
                'label' => 'Profile Peternakan',
                'icon' => 'bars',
                'category' => '2',
                'type' => 'single',
                'page_url' => 'farm.index',
                'permission' => 'farm.index'
            ],
            [
                'name' => 'admin-account',
                'label' => 'Akun Pengguna',
                'icon' => 'bars',
                'category' => '3',
                'type' => 'single',
                'page_url' => 'akun.index',
                'permission' => 'akun.index'
            ],
            [
                'name' => 'admin-role',
                'label' => 'Role',
                'icon' => 'bars',
                'category' => '3',
                'type' => 'single',
                'page_url' => 'role.index',
                'permission' => 'role.index'
            ],
            [
                'name' => 'system-translate',
                'label' => 'Terjemahan',
                'icon' => 'bars',
                'category' => '4',
                'type' => 'single',
                'page_url' => 'translate.index',
                'permission' => 'translate.index'
            ],
            [
                'name' => 'system-sidebar',
                'label' => 'Side Bar',
                'icon' => 'bars',
                'category' => '4',
                'type' => 'parent',
                'permission' => 'sidebar.menu'
            ],
            [
                'name' => 'system-customize',
                'label' => 'Personalisasi',
                'icon' => 'bars',
                'category' => '4',
                'type' => 'single',
                'page_url' => 'application.index',
                'permission' => 'application.index'
            ],
            [
                'name' => 'audit-model',
                'label' => 'Model Log',
                'icon' => 'bars',
                'category' => '5',
                'type' => 'single',
                'page_url' => 'model.index',
                'permission' => 'model.index'
            ],
            [
                'name' => 'audit-auth',
                'label' => 'Authenticate Log',
                'icon' => 'bars',
                'category' => '5',
                'type' => 'single',
                'page_url' => 'auth.index',
                'permission' => 'auth.index'
            ],
            [
                'name' => 'audit-system',
                'label' => 'System Log',
                'icon' => 'bars',
                'category' => '5',
                'type' => 'single',
                'page_url' => 'system.index',
                'permission' => 'system.index'
            ],
            [
                'name' => 'audit-query',
                'label' => 'Query Log',
                'icon' => 'bars',
                'category' => '5',
                'type' => 'single',
                'page_url' => 'query.index',
                'permission' => 'query.index'
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'name' => 'dashboard-statistic',
                'label' => 'Statistik',
                'menu_id' => 1,
                'icon' => 'bars',
                'page_url' => 'statistic.index',
                'permission' => 'none'
            ],
            [
                'name' => 'dashboard-report',
                'label' => 'Laporan',
                'menu_id' => 1,
                'icon' => 'bars',
                'page_url' => 'report.index',
                'permission' => 'report.index'
            ],
            [
                'name' => 'sidebar-category',
                'label' => 'Kategori',
                'menu_id' => 8,
                'icon' => 'bars',
                'page_url' => 'category.index',
                'permission' => 'category.index'
            ],
            [
                'name' => 'sidebar-menu',
                'label' => 'Menu',
                'menu_id' => 8,
                'icon' => 'bars',
                'page_url' => 'menu.index',
                'permission' => 'menu.index'
            ],
            [
                'name' => 'sidebar-page',
                'label' => 'Halaman',
                'menu_id' => 8,
                'icon' => 'bars',
                'page_url' => 'page.index',
                'permission' => 'page.index'
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
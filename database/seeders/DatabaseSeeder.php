<?php

namespace Database\Seeders;

use App\Models\FarmData;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MenuSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(TemplateSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(FarmDataSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(ApplicationSeeder::class);
    }
}
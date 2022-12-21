<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $applications = [
            [
                'application_name' => 'Eternak',
                'application_author' => 'Puskomedia',
                'application_keywords' => 'Bumdesa, Eternak, Puskomedia',
                'application_description' => 'System informasi pengelola data ternak',
                'sidebar_name' => 'Puskomedia'
            ]
        ];

        foreach ($applications as $application) {
            Application::create($application);
        }
    }
}
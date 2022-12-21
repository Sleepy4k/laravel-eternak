<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Admin',
            'email' => 'admin@puskomedia.id',
            'company' => 1,
            'whatsapp_number' => '8112617445',
            'password' => 'admin123'
        ])->assignRole('owner');

        User::create([
            'username' => 'Apri Pandu Wicaksono',
            'email' => 'pandu300478@gmail.com',
            'company' => 1,
            'whatsapp_number' => '81318977078',
            'password' => 'admin123'
        ])->assignRole('root');
    }
}
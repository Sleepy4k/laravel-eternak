<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\FarmData;
use App\Traits\RandomNumber;
use Illuminate\Database\Seeder;

class FarmDataSeeder extends Seeder
{
    use RandomNumber;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $livestock_1 = $this->generateUniqueId('kambing');
        $livestock_2 = $this->generateUniqueId('kambing');
        $livestock_3 = $this->generateUniqueId('kambing');

        $faker = Factory::create(config('app.faker_locale'));

        $FarmDatas = [
            [
                'company' => 1,
                'register_number' => $livestock_1,
                'livestock_name' => $faker->name(),
                'gender' => 'jantan',
                'racial' => 'nigeria',
                'birthday' => now(),
                'weight' => 50,
                'lenght' => 65,
                'height' => 60,
                'status' => 'hidup'
            ],
            [
                'company' => 1,
                'register_number' => $livestock_2,
                'livestock_name' => $faker->name(),
                'gender' => 'betina',
                'racial' => 'etawa',
                'birthday' => now(),
                'weight' => 25,
                'lenght' => 60,
                'height' => 55,
                'status' => 'hidup'
            ],
            [
                'company' => 1,
                'register_number' => $livestock_3,
                'livestock_name' => $faker->name(),
                'gender' => 'jantan',
                'racial' => 'boer',
                'birthday' => now(),
                'weight' => 15,
                'lenght' => 35,
                'height' => 30,
                'register_number_father' => $livestock_1,
                'register_number_mother' => $livestock_2,
                'status' => 'hidup'
            ]
        ];

        foreach ($FarmDatas as $FarmData) {
            FarmData::create($FarmData);
        }
    }
}
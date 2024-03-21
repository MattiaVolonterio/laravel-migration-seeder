<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(__DIR__ . '/../csv/trains.csv', "r");
        $train_data = fgetcsv($file);
        $is_first_line = true;

        while (!feof($file)) {
            if (!$is_first_line) {
                $train_data = fgetcsv($file);
                $train = new Train;
                $train->company = $train_data[0];
                $train->departure_station = $train_data[1];
                $train->arrival_station = $train_data[2];
                $train->departure_time = $train_data[3];
                $train->arrival_time = $train_data[4];
                $train->train_code = $train_data[5];
                $train->number_of_carriages = $train_data[6];
                $train->save();
            }
            $is_first_line = false;
        }

        // for ($i = 0; $i <= 100; $i++) {
        //     $train = new Train;
        //     $train->company = $faker->company();
        //     $train->departure_station = $faker->city();
        //     $train->arrival_station = $faker->city();
        //     $train->departure_time = $faker->dateTimeThisMonth('+10 days');
        //     $train->arrival_time = $faker->dateTimeThisMonth('+10 days');
        //     $train->train_code = $faker->bothify('???######');
        //     $train->number_of_carriages = $faker->numberBetween(4, 20);
        //     $train->in_time = $faker->boolean();
        //     $train->deleted = $faker->boolean();
        //     $train->save();
        // }
    }
}

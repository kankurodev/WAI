<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //Instantiate the faker
        $faker = Faker::create();

        //Loop 50 times to create 50 instances of test data
        for ($i = 0; $i < 50; $i++) {

            //Generate random gender
            $genderNum = rand(1, 3);
            switch ($genderNum) {
                case 1:
                    $gender = 'male';
                    break;
                case 2:
                    $gender = 'female';
                    break;
                case 3:
                    $gender = 'other';
                    break;
            }

            //Generate random age
            $age = rand(13, 122); //Max is based on oldest person ever verified

            //Generate random status
            $statusNum = rand(1, 4);
            switch ($statusNum) {
                case 1:
                    $status = 'In Queue';
                    break;
                case 2:
                    $status = 'Approved';
                    break;
                case 3:
                    $status = 'Denied';
                    break;
                case 4:
                    $status = 'Canceled';
                    break;
            }

            //Generate random ticket amount
            $tickets = rand(0, 10);

            //Get the current timestamp
            $now = Carbon::now();


            //Insert test data into raffle database
            DB::table('raffle')->insert([
                'entrant' => $faker->firstName.' '.$faker->lastName,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'gender' => $gender,
                'age' => $age,
                'status' => $status,
                'created_at'=> $now,
                'updated_at'=> $now
            ]);

            //Insert test data into raffle database
            DB::table('entrants')->insert([
                'entrant' => $faker->firstName.' '.$faker->lastName,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'gender' => $gender,
                'age' => $age,
                'tickets' => $tickets,
                'created_at'=> $now,
                'updated_at'=> $now
            ]);
        }
    }
}

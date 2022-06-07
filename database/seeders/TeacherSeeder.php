<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use Faker\Factory as fake;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = fake::create();
        for($i=1;$i<=10;$i++) {
            Teacher::insert([
                'fname' => $info->firstName,
                'mname' => $info->randomElement(['Bahing','Thulung','Singok']),
                'lname' => $info->lastName,
                'gender' => $info->randomElement(['male','female']),
                'age' => $info->numberBetween(18,30),
                'email' => $info->safeEmail,
                'phone' => $info->phoneNumber,
                'address' => $info->address
            ]);
        }
    }
}

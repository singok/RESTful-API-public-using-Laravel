<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as fake;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = fake::create();
        for($i=1;$i<=10;$i++) 
        {
            Student::insert([
                'fname' => $info->firstName,
                'mname' => $info->randomElement(['Bahing','Bantawa','Thulung']),
                'lname' => $info->lastName,
                'gender' => $info->randomElement(['male', 'female', 'other']),
                'email' => $info->safeEmail,
                'phone' => $info->phoneNumber,
                'address' => $info->address,
                'grade' => $info->numberBetween(1,12)
            ]);
        }
    }
}

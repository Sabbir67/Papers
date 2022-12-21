<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return static
     */
    public function run()
    {
        $faker = Faker::create();


        $admin = new User;
        $admin->name = 'sajan';
        $admin->email = 'admin@admin';
        $admin->password = Hash::make('admin123456');
        $admin->save();

    }
}

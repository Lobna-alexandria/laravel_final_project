<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $usera = User::create([
            'name' => 'super admin',
            'email' => 'super@gmail.com',
            'password' => \Hash::make('super123'),
        ]);
        $usera->attachRole('super_admin');

        $user = User::create([
            'name' => 'hoda',
            'email' => 'hoda@gmail.com',
            'password' => \Hash::make('hoda123'),
        ]);
        $user->attachRole('user');

// for portfolio


    }
}
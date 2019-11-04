<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name'=>'camnh',
                'email' => 'nguyenhuucam91@gmail.com', 
                'password' => Hash::make('123456')
            ]
        );
    }
}

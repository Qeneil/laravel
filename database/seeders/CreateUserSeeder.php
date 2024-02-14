<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [

            'name' => 'User',
            'email' => 'durf@user.com',
            'is_admin' => '0', 
            'password' => bcrypt('12345678')
        ],

        [

            'name' => 'Admin',
            'email' => 'durf@admin.com',
            'is_admin' => '1', 
            'password' => bcrypt('12345678')
        ]
    ];
       
    foreach($user as $key => $value) {
        User::create($value);
    }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'mimin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt(12345)
            ],
            [
                'name'=>'Mas Waiter',
                'email'=>'waiter@gmail.com',
                'role'=>'waiter',
                'password'=>bcrypt(12345)
            ],
            [
                'name'=>'Mas Kasir',
                'email'=>'kasir@gmail.com',
                'role'=>'kasir',
                'password'=>bcrypt(12345)
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
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
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'user_name'=>'admin',

             'is_admin'=>'1',
            'password'=> bcrypt('12345678'),
         ],
         [
            'name'=>'User',
            'email'=>'user@gmail.com',
            'user_name'=>'user',
             'is_admin'=>'0',
            'password'=> bcrypt('12345678'),
         ],
     ];

     foreach ($user as $key => $value) {
         User::create($value);
     }
 }

}

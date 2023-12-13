<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->createMany(
            [
                [
                    'name' => 'CRUD Laravel',
                    'email' => 'crudlaravel@email.com',
                    'password' => Hash::make('crudlaravel')
                ],
                [
                    'name' => 'Pablo Roldão',
                    'email' => 'pablo.roldao.santos@gmail.com',
                    'password' => Hash::make('987654321')
                ],
            ]);
    }
}

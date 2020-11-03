<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@smake.com',
            'password' => Hash::make('pa55word!')
        ]);
    }
}

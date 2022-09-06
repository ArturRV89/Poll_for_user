<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RandomUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        User::create([
            'name' => 'testUser',
            'email' => 'one'.'@gmail.com',
            'password' => Hash::make(1234567890),
            'role' => 'user'
        ]);
    }

}

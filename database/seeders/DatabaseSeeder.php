<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = 'Administartor';
        $user->email = 'admin@email.com';
        $user->password =  bcrypt ('password');
        $user->phone =  '0700000000';
        $user->account_type = 'none';
        $user->notes = 'none';

        $user->save();
    }
}

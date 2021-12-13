<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'level' => 'admin',
            'name' => 'admin 0',
            'email' => 'admin0@gmail.com',
            'password' => bcrypt('Uzo12345')
            ]);
    }
}

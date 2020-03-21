<?php

use Illuminate\Database\Seeder;
use App\Siswa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name'  => 'kadeksatya',
            'username' => 'admin',
            'password'  => bcrypt('password123'),
            'role' => 'admin'
    ]);
        

        
    }
}

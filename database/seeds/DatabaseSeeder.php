<?php

use Illuminate\Database\Seeder;
use App\Siswa;
use App\Kelas;
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
            'username' => 'admin',
            'password'  => bcrypt('password123'),
            'role' => 'admin'
    ]);
    // DB::table('siswa')->insert([
    //     'name' => 'Kadek Satya',
    //     'kelas'  => '10 RPL',
    //     'nis' => '12345678',
        
       
    // ]);
    // DB::table('kelas')->insert([
    //     'kelas'=>'10 RPL'
       
    // ]);

        
    }
}

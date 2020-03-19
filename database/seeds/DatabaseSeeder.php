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


        

            DB::table('siswa')->insert([
                'nama' => 'Kadek Restu Satya Wardana',
                'username' => 'kadeksatya',
                'kelas' => '10 RPL',
                'nis' => '12345',
                'password' => bcrypt('secret'),
            ]);
        
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table ='siswa';

    protected $fillable =[
        'gambar','name','nis','id_kelas','id_users'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table ='siswa';

    protected $fillable =[
        'nis','id_users','kelas'
    ];
}

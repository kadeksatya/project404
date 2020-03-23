<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table ='siswa';

    protected $fillable =[
        'gambar','name','id_kelas','nis'
    ];

    public function kelas()
    {
        return $this->hasMany('App\Kelas','id','id_kelas');
    }
}

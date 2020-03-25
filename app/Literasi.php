<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Literasi extends Model
{
    protected $table='literasi';
    
    protected $guarded=[];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function dataguru()
    {
        return $this->belongsTo(Guru::class);
    }
}

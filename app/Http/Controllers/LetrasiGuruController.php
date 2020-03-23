<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LetrasiGuru;
use App\Siswa;

class LetrasiGuruController extends Controller
{
    public function index(){

        $datasiswa['siswa']=Siswa::all();

        $data['literasi']=LetrasiGuru::latest()->paginate(5);
        return view('dashboard.letrasi_guru.guru',$data,$datasiswa);
    }
}

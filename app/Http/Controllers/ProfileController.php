<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Guru;
use App\Siswa;
use App\Literasi;
use App\Kelas;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function guru($id)
    {

    }
    public function siswa($id)
    {

    }
    public function updateGuru(Request $request)
    {

    }
    public function updateSiswa(Request $request)
    {

    }
    public function passGuru(Request $request)
    {

    }
    public function passSiswa(Request $request)
    {

    }
    public function fotoGuru(Request $request)
    {

    }
    public function fotoSiswa(Request $request)
    {

    }
}
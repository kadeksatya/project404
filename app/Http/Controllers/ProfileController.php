<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
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
        $profile = Guru::where('id',$id)->first();
        $id_users = $profile->id_users;
        $akun = User::where('id',$id_users)->first();

        return view('guru.profile',compact('profile', 'akun'));
    }
    public function siswa($id)
    {
        $profile = DB::table('siswa')
                ->select('siswa.id','siswa.gambar', 'siswa.name', 'siswa.nis','kelas.kelas','siswa.id_users')
                ->leftJoin('kelas','siswa.id_kelas','=','kelas.id')->where('siswa.id',$id)->first();
        $id_users = $profile->id_users;
        $akun = User::where('id',$id_users)->first();
        return view('siswa.profile',compact('profile', 'akun'));
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
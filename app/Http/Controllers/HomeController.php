<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Guru;
use App\Siswa;
use App\Literasi;
use App\Kelas;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role != 'admin') {
            return redirect('/')->with('error','Anda bukan admin!');
        } else {
            $guru = Guru::all();
            $jml_guru =count($guru);
            $siswa = Siswa::all();
            $jml_siswa =count($siswa);
            $kelas = Kelas::all();
            $jml_kelas =count($kelas);
            $literasi = Literasi::all();
            $jml_literasi =count($literasi);

            // dd($jml_guru,$jml_siswa,$jml_kelas,$jml_literasi);
            return view('dashboard.homepage',compact('jml_guru', 'jml_siswa','jml_kelas','jml_literasi'));
        }
        
    }
}

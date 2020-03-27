<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $id_siswa = $request->id_siswa;
        $username = $request->nis;
        $id_users = $request->id_users;
            
            if (empty($id_users)) {
                $akun = User::updateorCreate([
                    'username' => $username, 
                    'password'  => bcrypt('Siswa123'),
                    'role' => 'siswa']);
                
                $id_users=$akun->id;
            }
            // dd($akun);
        $siswa = Siswa::updateorCreate(['id' => $id_siswa],
            [
                'nis' => $request->nis,
                'name' => $request->name,
                'id_kelas' => $request->id_kelas,
                'id_users' =>$id_users,
            ]);

            return response()->json($siswa);
    }
    public function updateSiswa(Request $request)
    {
        $id_siswa = $request->id_siswa;
        // $username = $request->nis;
        // $id_users = $request->id_users;
            
        //     if (empty($id_users)) {
        //         $akun = User::updateorCreate([
        //             'username' => $username, 
        //             'password'  => bcrypt('Siswa123'),
        //             'role' => 'siswa']);
                
        //         $id_users=$akun->id;
        //     }
        //     // dd($akun);
        $siswa = Siswa::where('id',$id_siswa)->update(
            [
                'nis' => $request->nis,
                'name' => $request->name,
            ]);

            return response()->json($siswa);
    }
    public function passGuru(Request $request)
    {
        $id_users = $request->id_user;
        $newPass = $request->password;
        // $siswa = DB::table('siswa')->where('id',$id_siswa)->first();
        // $id_akun = $siswa->id_users;
        $akun = User::find($id_users);
        $akun->password = bcrypt($newPass);
        $akun->save();
        // $akun = User::update([
        //     'password'  => bcrypt($newPass)])
        //     ->where('id',$id_akun);

        return response()->json($akun);
    }
    public function passSiswa(Request $request)
    {
        $id_users = $request->id_user;
        $newPass = $request->password;
        // $siswa = DB::table('siswa')->where('id',$id_siswa)->first();
        // $id_akun = $siswa->id_users;
        $akun = User::find($id_users);
        $akun->password = bcrypt($newPass);
        $akun->save();
        // $akun = User::update([
        //     'password'  => bcrypt($newPass)])
        //     ->where('id',$id_akun);

        return response()->json($akun);
    }
    public function fotoGuru(Request $request)
    {

    }
    public function fotoSiswa(Request $request)
    {
        $input=$request->all();
        $image=$request->iamge;
        return response()->json($image);
        if (!empty($request->file('foto'))){
            $gambar =$request->file('foto');
            $ext    =$gambar->getClientOriginalExtension();

            if ($request->file('foto')->isValid()){
                $userName = session('namaUsers');
                $gambar_name = $userName."_".date('YmdHi').".".$ext;
                $upload_path ='fotoPP/';
                $filePP = $request->file('foto');
                // dd($filePP);
                $filePP->move($upload_path,$gambar_name);
                $input['profile_pic']    = $gambar_name;
            }
            $id_siswa =session('IDsiswa');
            $cek = Siswa::where('id', $id_siswa)->first();
            if (!empty($cek)) {
                $oldPic =$cek->gambar;
                File::delete('fotoPP/'.$oldPic);
            }
            $siswa = Siswa::where('id',$id_siswa)->update(['gambar' => $input['profile_pic'],]);
    
            $profile_pic = Siswa::where('id', $id_siswa)->first();
            session([
                'userIMG' => $profile_pic,
              ]);
            
            
            return response()->json(['success'=>"Foto berhasil di simpan"]);
            
        }else {
            return response()->json(['error'=>"Silahkan Pilih Foto"]);
        }
        
    }
}
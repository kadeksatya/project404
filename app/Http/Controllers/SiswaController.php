<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use Response;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['siswa'] = Siswa::orderBy('userID','asc')->paginate(5);
        return view('dashboard.siswa',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswaID = $request->id_user;
        $siswa = Siswa::Createorupdate(['userID' => $siswaID],
            ['username' => $request->username,'password' => $request->password,'nama' => $request->nama,'kelas' => $request->kelas,'nis' => $request->nis]
        );

        return Response::json($siswa);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('userID'=>$id);
        $siswa = Siswa::where($where)->first();

        return Response::json($siswa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa =Siswa::where('userID',$id)->delete();

        return Response::json($siswa);
    }
}

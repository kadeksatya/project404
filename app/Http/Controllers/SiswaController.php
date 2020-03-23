<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kelas;
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
        $datakelas['kelas']=Kelas::orderBy('id','asc')->get();
        $data['siswa'] = Siswa::orderBy('id','desc')->paginate(10);
        return view('dashboard.siswa',$data, $datakelas);
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
       $id_siswa = $request->id_siswa;

       $siswa = Siswa::updateorCreate(['id' => $id_siswa],
        [
            'name' => $request->name,
            'id_kelas' => $request->id_kelas,
            'nis' => $request->nis
        ]);

        return response()->json('error',$siswa);
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
        $where = array('id' => $id);
        $siswa = Siswa::where($where)->first();

        return response()->json('error',$siswa);
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
       $siswa = Siswa::where('id', $id)->delete();
       return response()->json('error',$siswa);
    }


    public function __construct()
    {
        $this->middleware('auth');
    }

}

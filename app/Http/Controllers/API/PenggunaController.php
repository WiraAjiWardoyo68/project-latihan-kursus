<?php

namespace App\Http\Controllers\API;

use App\Models\role;
use App\Models\pengguna;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=pengguna::getpengguna()->paginate(10);
        return response()->json($data);

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
        $validasi = $request->validate([
            'pengguna_username'          =>'required',
            'pengguna_nama_lengkap'      =>'required',
            'pengguna_email'             =>'required|email',
            'pengguna_nowa'              =>'required|numeric',
            'pengguna_tinggalsekarang'   =>'required',
            'pengguna_pekerjaan'         =>'required',
            'pengguna_password'          =>'required',
            'pengguna_foto'              =>'required|file|mimes:jpg,image,jpeg,png',

        ]);

        try {
            $fileName = Str::uuid().$request->file('pengguna_foto')->getClientOriginalName();
            $path = $request->file('pengguna_foto')->storeAs('pengguna',$fileName);
            $validasi['pengguna_foto'] =$path;

            $request->merge([
                'pengguna_foto' => $path,
                'pengguna_uuid' => Str::uuid(),
                'pengguna_role' => $request->pengguna_role

            ]);
            $data = pengguna::create($request->input());

            return response()->json([
                'status'    => 'success',
                'message'   => 'Selamat Berhasil Menambah Data',
                'title'     => 'Data Pengguna',
                'data'      => $data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ada Kesalahan Menambah Data',
                'errors' =>$e->getMessage()
            ]);
        }

        function role(){
            $data=role::all();
            return response()->json($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,pengguna $pengguna, $uuid)
    {
        $validasi=$request->validate([

            'pengguna_username'          =>'required',
            'pengguna_nama_lengkap'      =>'required',
            'pengguna_email'             =>'required|email',
            'pengguna_nowa'              =>'required|numeric',
            'pengguna_tinggalsekarang'   =>'required',
            'pengguna_pekerjaan'         =>'required',
            'pengguna_password'          =>'required',
            'pengguna_foto'              =>'',
            'pengguna_role'              =>'',
        ]);
        try {
            if($request->file('pengguna_foto')){
                 $fileName = Str::uuid().$request->file('pengguna_foto')->getClientOriginalName();
                 $path = $request->file('pengguna_foto')->storeAs('pengguna',$fileName);
                 $validasi['pengguna_foto'] =$path;
            }
            $response = pengguna::find($uuid);
            $response->update($validasi);
            return response()->json([
                'status'    => 'success',
                'message'   => 'Selamat Berhasil Mengubah Data',
                'title'     => 'Data Pengguna',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ada Kesalahan Mengubah Data',
                'errors' =>$e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        try {

            $response = pengguna::find($uuid);
            $response->delete();
            return response()->json([
                'status'    => 'success',
                'message'   => 'Selamat Berhasil Menghapus data Data',
                'title'     => 'Data Pengguna',

            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ada Kesalahan Menghapus Data',
                'errors' =>$e->getMessage()
            ]);
        }
    }
}

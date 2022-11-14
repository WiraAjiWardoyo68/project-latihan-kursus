<?php

namespace App\Http\Controllers\API;

use App\Models\jenis_kelas;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenisKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=jenis_kelas::getjenis_kelas()->paginate(10);
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

            'jenis_kelas_name'             =>'required',
            'jenis_kelas_ket'              =>''
        ]);

        try {

            $request->merge([

                'jenis_kelas_uuid' => Str::uuid(),

            ]);

            $data = jenis_kelas::create($request->input());

            return response()->json([
                'status'    => 'success',
                'message'   => 'Selamat Berhasil Menambah Data jenis Kelas',
                'title'     => 'Data Kategori Kelas',
                'data'      => $data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message'   => 'Ada Kesalahan Menambah Data jenis Kelas',
                'errors'    =>$e->getMessage()
            ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $validasi=$request->validate([

            'jenis_kelas_name'         =>'required',
            'jenis_kelas_ket'          =>'',

        ]);
        try {
            $response = jenis_kelas::find($uuid);
            $response->update($validasi);
            return response()->json([
                'status'    => 'success',
                'message'   => 'Selamat Berhasil Mengubah Data Jenis Kelas',
                'title'     => 'Data Jenis Kelas',

            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ada Kesalahan Mengubah Data Kategori Kelas',
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
            $kategori_kelas=jenis_kelas::find($uuid);
            $kategori_kelas->delete();
            return response()->json([
                'status'    => 'success',
                'message'   => 'Selamat Berhasil Menghapus data Data Jenis Kelas',
                'title'     => 'Data jenis Kelas',

            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ada Kesalahan Menghapus Data Jenis Kelas',
                'errors' =>$e->getMessage()
            ]);
        }
    }
}

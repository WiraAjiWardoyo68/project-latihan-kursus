<?php

namespace App\Http\Controllers\API;

use App\Models\role;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=role::getRole()->paginate(10);
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
    public function store(Request $request,role $role)
    {
        $validasi = $request->validate([

            'role_name'             =>'required',
            'role_keterangan'       =>'required'
        ]);

        try {

            $request->merge([

                'role_uuid' => Str::uuid(),

            ]);

            $data = role::create($request->input());

            return response()->json([
                'status'    => 'success',
                'message'   => 'Selamat Berhasil Menambah Data Role',
                'title'     => 'Data Role',
                'data' => $data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ada Kesalahan Menambah Data',
                'errors' =>$e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, role $role, $uuid)
    {
        $validasi=$request->validate([

            'role_name'         =>'required',
            'role_keterangan'   =>'',

        ]);
        try {
            $response = role::find($uuid);
            $response->update($validasi);
            return response()->json([
                'status'    => 'success',
                'message'   => 'Selamat Berhasil Mengubah Data Role',
                'title'     => 'Data Role',

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
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        try {
            $role=role::find($uuid);
            $role->delete();
            return response()->json([
                'status'    => 'success',
                'message'   => 'Selamat Berhasil Menghapus data Data',
                'title'     => 'Data Role',

            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ada Kesalahan Menghapus Data',
                'errors' =>$e->getMessage()
            ]);
        }
    }
}

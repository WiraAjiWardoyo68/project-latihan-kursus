<?php

namespace App\Http\Controllers\API;

use App\Models\mentor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=mentor::getmentor()->paginate(2);
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

            'mentor_fullname'          =>'required',
            'mentor_biodata'           =>'required',
            'mentor_foto'              =>'required|file|mimes:jpg,image,jpeg,png',

        ]);

        try {
            $fileName = Str::uuid().$request->file('mentor_foto')->getClientOriginalName();
            $path = $request->file('mentor_foto')->storeAs('mentor',$fileName);
            $validasi['pengguna_foto'] =$path;



            $request->merge([
                'mentor_foto' => $path,
                'mentor_uuid' => Str::uuid(),

            ]);
            $data = mentor::create($request->input());

            return response()->json([
                'status'    => 'success',
                'message'   => 'Selamat Berhasil Menambah Data Mentor',
                'title'     => 'Data Mentor',
                'data'      => $data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ada Kesalahan Menambah Data Mentor',
                'errors'  =>$e->getMessage()
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
        $data = mentor::latest()->paginate(5);
        return response()->json($data);
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
    public function update(Request $request,mentor $mentor, $uuid)
    {
        $validasi=$request->validate([

            'mentor_fullname'          =>'required',
            'mentor_biodata'           =>'required',
            'mentor_foto'              =>'',
        ]);
        try {
            if($request->file('mentor_foto')){
                 $fileName =Str::uuid().$request->file('mentor_foto');
                 $path = $request->file('mentor_foto')->storeAs('mentor',$fileName);
                 $validasi['mentor_foto'] =$path;
            }

            Storage::delete('mentor/'.$mentor->mentor_foto);

            $response = mentor::find($uuid);
            $response->update($validasi);

            return response()->json([
                'status'    => 'success',
                'message'   => 'Selamat Berhasil Mengubah Data Mentor',
                'title'     => 'Data Mentor',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ada Kesalahan Mengubah Data Mentor',
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

            $response = mentor::find($uuid);
            $response->delete();
            return response()->json([
                'status'    => 'success',
                'message'   => 'Selamat Berhasil Menghapus data Data Mentor',
                'title'     => 'Data Mentor',

            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ada Kesalahan Menghapus Data Mentor',
                'errors' =>$e->getMessage()
            ]);
        }
    }
}

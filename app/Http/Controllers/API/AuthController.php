<?php
namespace App\Http\Controllers\API;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'username'              => 'required|string|max:255',
            'nama_lengkap'          => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'no_hp'                 => 'required|string|numeric',
            'tinggal_sekarang'      => 'required|string',
            'pekerjaan'             => 'required|string',
            'password'              => 'required|string|min:8',
            'c_password'            => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json(['title' => 'Pendaftaran gagal', 'message' => 'Maaf, Pendaftaran Anda Gagal dan Silahkan Coba Lagi ', 'errors' => $validator->errors()]);
        }

        $user = User::create([
            'uuid'                  => Str::uuid(),
            'username'              => $request->username,
            'nama_lengkap'          => $request->nama_lengkap,
            'email'                 => $request->email,
            'no_hp'                 => $request->no_hp,
            'tinggal_sekarang'      => $request->tinggal_sekarang,
            'pekerjaan'             => $request->pekerjaan,
            'password'              => Hash::make($request->password),
            'c_password'            => Hash::make($request->password)
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer','title' => 'Pendaftaran Berhasil', 'message' => 'Data Anda Sukses di Daftarkan, Silahkan Login ']);
    }

    public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return response()->json([
                'message' => 'error', 'Password Lama Tidak Cocok',
            ]);
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json([
            'message' => 'Status', 'Pembaruan Password Berhasil',
        ]);

}

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Maaf, Anda Gagal Login Silahkan Coba Login Lagi', 'title' => 'Gagal Login'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['message' => 'Selamat Datang  '.$user->name.', Login Anda Sukses','access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Selamat Anda Sukses Logout'
        ];
    }
}

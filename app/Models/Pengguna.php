<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pengguna extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    protected $table = 'pengguna';

    protected $primaryKey = 'pengguna_uuid';
    protected $fillable = [
            'pengguna_uuid',
            'pengguna_username',
            'pengguna_nama_lengkap',
            'pengguna_email',
            'pengguna_nowa',
            'pengguna_tinggalsekarang',
            'pengguna_pekerjaan',
            'pengguna_password',
            'pengguna_foto',
            'pengguna_role',
      ];
      static function getPengguna() {
        $return=DB::table('pengguna')
        ->join('role','pengguna.pengguna_role','=','role.role_uuid');
        return $return;
      }
}

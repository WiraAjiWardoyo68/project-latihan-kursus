<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;


class Peserta extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    protected $table = 'peserta';

    protected $primaryKey = 'peserta_uuid';

    protected $fillable = [
        'peserta_uuid',
        'peserta_kelas',
        'peserta_pengguna',
        'peserta_tanggal',
        'peserta_status',
        'peserta_tanggapan',
        'peserta_sertifikat',

  ];
  static function getPeserta() {
    $return=DB::table('peserta')
    ->join('kelas','peserta.peserta_kelas','=','kelas.kelas_uuid');
     $return=DB::table('peserta')
    ->join( 'pengguna','peserta.peserta_pengguna','=','pengguna.pengguna_uuid');
    $return=DB::table('peserta')
    ->join( 'sertifikat','peserta.peserta_sertifikat','=','sertifikat.sertifikat_uuid');
    return $return;

  }



}


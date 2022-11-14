<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kelas extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    protected $table = 'kelas';

    protected $primaryKey = 'kelas_uuid';

    protected $fillable = [
        'kelas_uuid',
        'kelas_nama',
        'kelas_jumlahpeserta',
        'kelas_kategori',
        'kelas_jenis',
        'kelas_level',
        'kelas_mentor',
        'kelas_browsur',
        'kelas_harga',
  ];

  static function getkelas() {
    $return=DB::table('kelas')
    ->join('kategori_kelas','kelas.kelas_kategori','=','kategori_kelas.kategori_kelas_uuid');
    $return=DB::table('kelas')
    ->join('jenis_kelas','kelas.kelas_jenis','=','jenis_kelas.jenis_kelas_uuid');
    $return=DB::table('kelas')
    ->join('level_kelas','kelas.kelas_level','=','level_kelas.level_kelas_uuid');
    $return=DB::table('kelas')
    ->join('mentor','kelas.kelas_mentor','=','mentor.mentor_uuid');
    return $return;
  }
}

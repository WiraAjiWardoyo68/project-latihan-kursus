<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class kategori_kelas extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
    public $primaryKey = 'kategori_kelas_uuid';
    protected $table = 'kategori_kelas';

    protected $fillable = [
            'kategori_kelas_uuid',
            'kategori_kelas_nama',
            'kategori_kelas_ket',
      ];

      static function getkategori_kelas() {
        $return=DB::table('kategori_kelas');
        return $return;
      }
}

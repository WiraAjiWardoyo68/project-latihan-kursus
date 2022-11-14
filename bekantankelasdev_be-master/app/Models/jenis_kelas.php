<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class jenis_kelas extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
    public $primaryKey = 'jenis_kelas_uuid';
    protected $table = 'jenis_kelas';

    protected $fillable = [
        'jenis_kelas_uuid',
        'jenis_kelas_name',
        'jenis_kelas_ket',
  ];

  static function getjenis_kelas() {
    $return=DB::table('jenis_kelas');
    return $return;
  }
}

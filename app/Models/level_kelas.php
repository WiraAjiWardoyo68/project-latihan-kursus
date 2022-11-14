<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class level_kelas extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
    public $primaryKey = 'level_kelas_uuid';
    protected $table = 'level_kelas';

    protected $fillable = [
        'level_kelas_uuid',
        'level_kelas_name',
        'level_kelas_ket',
  ];

  static function getlevel_kelas() {
    $return=DB::table('level_kelas');
    return $return;
  }


}

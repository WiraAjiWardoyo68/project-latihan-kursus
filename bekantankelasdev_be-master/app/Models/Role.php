<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
    public $primaryKey = 'role_uuid';
    protected $table = 'role';

    protected $fillable = [
            'role_uuid',
            'role_name',
            'role_keterangan',
      ];

      static function getRole() {
        $return=DB::table('role');
        return $return;
      }


}

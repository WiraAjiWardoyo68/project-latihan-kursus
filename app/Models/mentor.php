<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mentor extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    protected $table = 'mentor';

    protected $primaryKey = 'mentor_uuid';
    protected $fillable = [
            'mentor_id',
            'mentor_uuid',
            'mentor_fullname',
            'mentor_biodata',
            'mentor_foto',

      ];
      static function getmentor() {
        $return=DB::table('mentor');
        return $return;
      }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Olahraga extends Model
{
    protected $primaryKey = 'id_olahraga';
    protected $table = 'olahraga';
    protected $fillable = ['nama_olahraga', 'keterangan', 'updated_at', 'created_at'];
}

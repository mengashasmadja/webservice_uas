<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atlit extends Model
{
    protected $primaryKey = 'id_atlit';
    protected $table = 'atlit';
    protected $fillable = ['nama_atlit', 'ttl', 'jnis_klamin', 'id_olahraga'];

    public function olahraga(){
        return $this->belongsTo(Olahraga::class, 'id_olahraga');
        // return $this->belongsTo(Lapangan::class, 'id_lapangan');
    }
}

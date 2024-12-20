<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $fillable = ['iduser','idpenyakit','hasilcf'];
    use HasFactory;

    public function penyakit(){
        return $this->belongsTo(penyakit::class,'idpenyakit','id');
    }
    
}

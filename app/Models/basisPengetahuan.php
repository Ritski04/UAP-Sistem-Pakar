<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class basisPengetahuan extends Model
{
    use HasFactory;
    protected $fillable = ['idpenyakit','idgejala','idmb','idmd'];

    public function gejala(){
        return $this->belongsTo(Gejala::class,'idgejala','id');
    }

    public function penyakit(){
        return $this->belongsTo(penyakit::class,'idpenyakit','id');
    }

    public function mb(){
        return $this->belongsTo(nilai::class,'idmb','id');
    }

    public function md(){
        return $this->belongsTo(nilai::class,'idmd','id');
    }
}

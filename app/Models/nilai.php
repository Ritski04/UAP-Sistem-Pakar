<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;
    protected $fillable = ['nilai','keterangan'];
    public function mb(){
        return $this->hasMany(basisPengetahuan::class, 'idmb','id');
    }

    public function md(){
        return $this->hasMany(basisPengetahuan::class, 'idmd','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partnership extends Model
{
    protected $table = 'partnerships';
    protected $fillable = ['name','cover','description','is_active','id_agency','id_institution'];
    public function agency(){
        return $this->belongsTo(Agency::class, 'id_agency');
    }
    public function institution(){
        return $this->belongsTo(Institution::class,'id_institution');
    }
    
}

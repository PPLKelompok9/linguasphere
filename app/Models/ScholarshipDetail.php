<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScholarshipDetail extends Model
{
    protected $table = 'scholarship_details';
    protected $fillable = ['date', 'id_user', 'id_scholarship'];
    public function users(){
        return $this->hasMany(Users::class, 'id_user');
    }
    public function scholarship(){
        return $this->hasMany(Scholarship::class,'id_scholarship');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScholarshipDetail extends Model
{
    protected $table = 'scholarship_details';
    protected $fillable = ['date', 'id_user', 'id_scholarship'];
    
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function scholarship(){
        return $this->belongsTo(Scholarship::class,'id_scholarship');
    }
}

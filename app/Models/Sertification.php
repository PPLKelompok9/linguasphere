<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sertification extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sertifications';
    protected $fillable = ['name', 'cover', 'description', 'slug', 'price', 'level', 'id_agency', 'id_category'];
    public function agency(){
        return $this->belongsTo(Agency::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

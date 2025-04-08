<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Institution extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'institutions';
    protected $fillable = ['name', 'cover', 'description', 'slug', 'address', 'contact'];
    public function setNameAttribute($value){
        $this->attributes['name']= $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function partnerships(){
        return $this->hasMany(Partnership::class, 'id_institution');
    }
}

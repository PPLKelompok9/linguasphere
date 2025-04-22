<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'courses';
    protected $fillable = ['name', 'description', 'cover', 'slug','price', 'diskon_price', 'level', 'id_agency'];
    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function agency():BelongsTo{
        return $this->belongsTo(Agency::class, 'id_agency');
    }

    public function pathDetails(){
        return $this->hasMany(PathDetail::class, 'id_course');
    }

}

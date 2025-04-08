<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relation\BelongsTo;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description', 'cover', 'slug','price', 'diskon_price', 'level', 'id_agency', 'id_category'];
    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function agency():BelongsTo{
        return $this->belongsTo(Agency::class);
    }
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }
}

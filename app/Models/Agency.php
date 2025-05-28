<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Agency extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'agencies';
    protected $fillable = ['name', 'cover', 'description', 'slug', 'address', 'contact','category_id',];
    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function courses():HasMany{
        return $this->hasMany(Course::class, 'id_agency');
    }
    public function sertification():HasMany{
        return $this->hasMany(Sertification::class,'id_agency');
    }
    public function partnerships():HasMany{
        return $this->hasMany(Partnership::class,'id_agency');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

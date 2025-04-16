<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relation\HasMany;
use Illuminate\Database\Eloquent\Relation\BelongsTo;

class Agency extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'agency';
    protected $fillable = ['name', 'cover', 'description', 'slug', 'address', 'contact'];
    public function courses():HasMany{
        return $this->hasMany(Course::class, 'id_agency');
    }
    public function sertification():HasMany{
        return $this->hasMany(Sertification::class,'id_agency');
    }
    public function partneship():HasMany{
        return $this->hasMany(Partnership::class,'id_agency');
    }
}

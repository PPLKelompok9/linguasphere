<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'courses';
    protected $fillable = [
        'name', 
        'description', 
        'cover', 
        'slug',
        'price', 
        'diskon_price', 
        'level', 
        'id_agency',
        'impressions',
        'total_sales',
        'total_revenue',
        'total_students',
        'icon'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'diskon_price' => 'decimal:2',
        'total_revenue' => 'decimal:2',
    ];

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

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_enrollments', 'course_id', 'user_id')
                    ->where('role', 'student');
    }

    public function updateStats()
    {
        $this->total_students = $this->students()->count();
        $this->total_revenue = $this->total_sales * $this->price;
        $this->save();
    }
}

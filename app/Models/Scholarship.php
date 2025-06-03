<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scholarship extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'requirements',
        'benefits',
        'deadline',
        'course_id',
        'slots_available',
        'status'
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'requirements' => 'array',
        'benefits' => 'array',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(ScholarshipDetail::class, 'id_scholarship');
    }

    public function isOpen(): bool
    {
        return $this->status === 'open' && 
               $this->deadline->isFuture() && 
               $this->applications()->count() < $this->slots_available;
    }
}

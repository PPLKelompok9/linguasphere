<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScholarshipApplication extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'scholarship_id',
        'user_id',
        'motivation_letter',
        'cv_path',
        'status',
        'admin_notes'
    ];

    public function scholarship(): BelongsTo
    {
        return $this->belongsTo(Scholarship::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
} 
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scholarship extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'scholarships';
    protected $fillable = ['name', 'cover', 'description', 'slug', 'address', 'contact'];
    public function partnership(){return $this->belongsTo(Partnership::class);}

}

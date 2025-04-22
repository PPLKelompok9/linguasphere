<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pretest extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pretests';
    protected $fillable = ['skor', 'id_user', 'id_course'];
    public function user(){return $this->belongsTo(User::class, 'id_user');}
    public function course(){return $this->belongsTo(Course::class, 'id_course');}
}

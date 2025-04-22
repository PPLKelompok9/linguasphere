<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PathDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'path_details';
    protected $fillable = ['id_path', 'id_course', 'position'];
    public function path(){
        return $this->belongsTo(Path::class, 'id_path');
    }
    public function course(){
        return $this->belongsTo(Course::class,'id_course');
    }
}

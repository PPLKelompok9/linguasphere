<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Path extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'paths';
    protected $fillable = ['name','description'];

    public function pathdetails(){
        return $this->belongsTo(PathDetail::class, 'id_path');
    }

}

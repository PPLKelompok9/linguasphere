<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institution extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'institution';
    protected $fillable = ['name', 'cover', 'description', 'slug', 'address', 'contact'];

    public function partnerships(){
        return $this->hasMany(Partnership::class, 'id_institution');
    }
}

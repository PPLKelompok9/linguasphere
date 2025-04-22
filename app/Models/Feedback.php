<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'feedbacks';
    protected $fillable = ['rating', 'commentar', 'type_products', 'id_products', 'id_users'];
    public function users(){
        return $this->hasMany(User::class);
    }

}

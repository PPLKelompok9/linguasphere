<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['total_price', 'type_payment', 'status_payment', 'type_products', 'id_products', 'id_user'];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_products')->where('type_products', 'course');
    }

    public function certification()
    {
        return $this->belongsTo(Certification::class, 'id_products')->where('type_products', 'certification');
    }
}

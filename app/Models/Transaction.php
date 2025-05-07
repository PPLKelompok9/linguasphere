<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{

    use SoftDeletes;

    protected $table = 'transactions';
    protected $fillable = ['booking_id', 'total_price', 'type_payment', 'status_payment', 'type_products', 'id_products', 'id_user', 'id_agency'];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_products');
    }

    public function certification()
    {
        return $this->belongsTo(Certification::class, 'id_products')->where('type_products', 'certification');
    }

    public function agencies(){
        return $this->belongsTo(Agency::class, 'id_agency');
    }
}

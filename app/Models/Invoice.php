<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'number',
        'date',
        'rent_type',
        'amount',
        'payment_date'
    ];

    public function property (){
        return $this->hasOne(property::class);
    }

    public function tenant(){
        return $this->hasOne(Tenant::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $table = 'tenants';

    protected $fillable = [
        'name',
        'address',
        'city',
        'phone_number',
        'image',
        'email'
    ];

    public function invoices (){
        return $this->hasMany(Invoice::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = [
        'name',
        'city',
        'address',
        'type',
        'image',
        'description',
        'isRented',
        'rent_date',
        'rent_end_date'
    ];

    public function invoices (){
        return $this->hasMany(Property::class);
    }

    public function tenant(){
        
        return $this->hasOne(Tenant::class);
    }

   

}

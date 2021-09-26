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
        'description',
        'isRented',
        'rent_date',
        'rent_end_date'
    ];

    public function tenant(){
        
        return $this->hasOne(tenant::class);
    }
}

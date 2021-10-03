<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contracts';

    protected $fillable = [
        'date',
        'close_date',
        'rent_amount',
        'rent_type',
      
    ];

    public function property (){

        return $this->hasOne(Property::class);
    }

    public function tenant (){
        return $this->hasOne(Tenant::class);
    }

}

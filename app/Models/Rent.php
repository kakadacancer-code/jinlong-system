<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{   
    protected $primaryKey = 'id';
    
    protected $fillable = [

    'tenant_name',
    'property_name',
    'price',
    'start_date',
    'end_date'
];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
   protected $fillable = [
    'tenant_name',
    'email',
    'property_name',
    'price',
    'status',
    'start_date',
    'end_date',
];
}

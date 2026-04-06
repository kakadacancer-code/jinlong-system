<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    protected $fillable = ['property_id', 'unit_number', 'status'];

    public function property() { return $this->belongsTo(Property::class); }
    public function leases()   { return $this->hasMany(Lease::class); }
}
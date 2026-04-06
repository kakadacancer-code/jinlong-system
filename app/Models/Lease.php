<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    protected $table = 'leases';
    protected $fillable = [
    'tenant_id',
    'unit_id',
    'start_date',
    'status'];

    public function tenant()   { return $this->belongsTo(Tenant::class); }
    public function unit()     { return $this->belongsTo(Unit::class); }
    public function payments() { return $this->hasMany(Payment::class); }
}
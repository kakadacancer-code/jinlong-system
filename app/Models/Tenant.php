<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = 'tenants';
    protected $fillable = ['name', 'email', 'phone'];

    public function leases()              { return $this->hasMany(Lease::class); }
    public function maintenanceRequests() { return $this->hasMany(MaintenanceRequest::class); }
}
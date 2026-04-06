<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    protected $table = 'maintenance_requests';
    protected $fillable = [
        'tenant_id',
        'description',
        'status'];

    public function tenant() { return $this->belongsTo(Tenant::class); }
}
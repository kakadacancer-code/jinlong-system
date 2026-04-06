<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['lease_id', 'amount', 'payment_date', 'status'];

    public function lease() { return $this->belongsTo(Lease::class); }
}
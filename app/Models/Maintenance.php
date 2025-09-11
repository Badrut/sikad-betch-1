<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'inventory_id',
        'maintenance_type',
        'maintenance_date',
        'description',
        'cost',
        'staff_in_charge_id',
        'status',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function staffInCharge()
    {
        return $this->belongsTo(Teacher::class, 'staff_in_charge_id');
    }
}

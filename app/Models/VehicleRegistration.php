<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleRegistration extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function complains()
    {
        return $this->hasMany(Complain::class, 'vehicle_id');
    }
    public function lastvisit()
    {
        return $this->hasOne(Complain::class, 'vehicle_id')->latest();
    }
}

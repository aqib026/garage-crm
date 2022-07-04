<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartOrders extends Model
{
    use HasFactory;

    public function vehicle()
    {
        return $this->belongsTo(VehicleRegistration::class,'vehicle_id');
    }
    public function parts()
    {
        return $this->hasMany(OrderedPart::class,'order_id');
    }

}

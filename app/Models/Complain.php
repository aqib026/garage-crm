<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;
    public function vehicle()
    {
        return $this->belongsTo(VehicleRegistration::class);
    }
}

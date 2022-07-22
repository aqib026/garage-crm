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
    public function files()
    {
        return $this->hasMany(File::class, 'complain_id');
    }
    public function notes()
    {
        return $this->hasMany(Note::class, 'complain_id');
    }
}

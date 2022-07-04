<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedPart extends Model
{
    use HasFactory;
    public function dealer()
    {
        return $this->belongsTo(Dealer::class,'dealer_id');
    }
}

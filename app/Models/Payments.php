<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $fillable = [
        'plans_id',
        'healthpost_id',
        'fullname',
         'amount',
         'health_center'
    ];
    public function plans()
    {
        return $this->belongsTo(Plans::class);
    }
    Public function health()
    {
        return $this->belongsTo(Health::class);
    }
}

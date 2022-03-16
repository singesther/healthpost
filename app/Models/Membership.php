<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $fillable = [
    'healthpost_id',
    'no_of_installment', 
    'total_price', 
    'extended', 
    'start_date', 
    'end_date', 
    'status'
];

public function post()
{
    return $this->belongsTo(healthposts::class);
}
}

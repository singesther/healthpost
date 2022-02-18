<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $fillable = [
    'healthpost_id','no_of_installment', 'total_price', 'start_date', 'end_date'




];


public function post()
{
    return $this->belongsTo(healthpost::class);
}
}

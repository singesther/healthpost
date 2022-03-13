<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class installments extends Model
{

    use HasFactory;
    protected $fillable = [
        'healthpost_id', 'membership_id','pay_date', 'amount', 'due_date', 'status'
    ];
        public function membership()
        {
            return $this->belongsTo(membership::class);
        }
        public function healthposts()
        {
            return $this->belongsTo(healthposts::class);
        }
}

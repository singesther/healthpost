<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class healthposts extends Model
{
    protected $fillable = [
       'owner_id','healthcenter_id', 'healthpost_name', 'address', 'phone', 'tin_number'





    ];


    public function health()
    {
        return $this->belongsTo(Health::class);
    }

}

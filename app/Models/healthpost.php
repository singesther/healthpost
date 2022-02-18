<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class healthpost extends Model
{
    protected $fillable = [
       'owner_id','healthpost_id', 'name', 'address', 'phone', 'tin_number'





    ];


    public function health()
    {
        return $this->belongsTo(Health::class);
    }

}

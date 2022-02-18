<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    use HasFactory;
    protected $fillable = [
        'health_center_name', 'address', 'phone', 'cell', 'healthpost_name'


    ];


}

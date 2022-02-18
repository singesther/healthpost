<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    use HasFactory;

    protected $fillable = [

       'fullname',
       'phone',
       'email',
       'address'

    ];
    public function health()
    {
        return $this->belongsTo(Health::class);
    }


}

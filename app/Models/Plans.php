<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    use HasFactory;
    Protected $fillable = [
       
        'name', 'detail', 'amount','plans_id'];
        public function members()
        {
            return $this->hasMany(Members::class);
        }
        protected $primaryKey = 'plans_id';
       
    
}

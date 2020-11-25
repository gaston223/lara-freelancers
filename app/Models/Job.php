<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;


    /**
     * @param mixed $query
     * 
     * @return $query
     */
    public function scopeOnline($query)
    {
        return $query->where('status', 1);
    }

    /**
     * @return user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

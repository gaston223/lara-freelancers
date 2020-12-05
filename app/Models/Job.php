<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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


    public function likes()
    {
        return $this->belongsToMany(User::class);
    }

    public function isLiked()
    {
        if(auth()->check()){
            return auth()->user()->likes->contains('id', $this->id);
        }
    }

}

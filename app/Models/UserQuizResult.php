<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuizResult extends Model
{
    protected $fillable = [
        'user_id', 'type', 'correct_count', 'wrong_count', 'point'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

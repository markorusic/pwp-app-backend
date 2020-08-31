<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'user_id'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function scopeOrdered ($query) {
        return $query->orderBy('created_at', 'desc');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    protected $fillable = [
        'title', 'texte', 'user_id'
    ];

    protected $table = 'ads';
}

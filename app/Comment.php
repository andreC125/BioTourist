<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   protected $fillable = [
      'ticket_id', 'user_id', 'comment'
    ]; 
    
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
 
    protected $garded =[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}

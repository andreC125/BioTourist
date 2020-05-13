<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * Get the ads for the region.
     */
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}

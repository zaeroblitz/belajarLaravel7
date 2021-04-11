<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function scopeLatestFirst()
    {
        return $this->latest()->first();
    }

    public function scopeOrderByTitle()
    {
        return $this->orderBy('title', 'asc')->get();
    }
}

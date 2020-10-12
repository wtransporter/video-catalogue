<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = ['id'];

    public function scopeType($query, string $type)
    {
        return $query->whereType($type);
    }
}

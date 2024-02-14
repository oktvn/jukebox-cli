<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = ['name', 'artist_id'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}

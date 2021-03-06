<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'songName',
        'artistName',
        'tags',
        'plays',
        'listeners',
        'songIdLastFm'
    ];
}

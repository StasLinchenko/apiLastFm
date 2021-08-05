<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    protected $fillable = [
        'albumName',
        'albumSongs',
        'plays',
        'listeners'
    ];

    protected $table = 'albums';
}

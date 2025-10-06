<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaKamar extends Model
{
    protected $fillable = [
        'tipe_kamar',
        'harga',
        'foto',
        'video',
    ];
}

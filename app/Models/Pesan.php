<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = [
        'nama_pemesan',
        'jenis_kelamin',
        'nomor_identitas',
        'tipe_kamar',
        'tanggal_pesan',
        'tanggal_check_out',
        'durasi',
        'breakfast',
        'total_harga',
    ];
}

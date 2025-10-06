<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaKamarSeeder extends Seeder
{
    public function run()
    {
        DB::table('media_kamars')->updateOrInsert(
            ['tipe_kamar' => 'Standar'],
            ['harga' => 23500000]
        );

        DB::table('media_kamars')->updateOrInsert(
            ['tipe_kamar' => 'Deluxe'],
            ['harga' => 25900000]
        );

        DB::table('media_kamars')->updateOrInsert(
            ['tipe_kamar' => 'Family'],
            ['harga' => 35600000]
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MediaKamar;

class HomeController extends Controller
{
    public function index()
    {
        $mediaKamars = MediaKamar::all()->keyBy('tipe_kamar');
        return view('home', compact('mediaKamars'));
    }
}

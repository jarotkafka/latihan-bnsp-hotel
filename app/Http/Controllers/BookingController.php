<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        return view('pesan');
    }

    public function store(Request $request)
    {
        // sementara testing aja
        return $request->all();
    }
}

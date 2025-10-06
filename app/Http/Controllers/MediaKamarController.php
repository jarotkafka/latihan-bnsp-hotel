<?php

namespace App\Http\Controllers;

use App\Models\MediaKamar;
use Illuminate\Http\Request;

class MediaKamarController extends Controller
{
    public function index()
    {
        $mediaKamars = MediaKamar::all();
        return view('media_kamar.index', compact('mediaKamars'));
    }

    public function apiIndex()
    {
        $mediaKamars = MediaKamar::all(['tipe_kamar', 'harga']);
        return response()->json($mediaKamars);
    }

    public function show($tipe)
    {
        $mediaKamar = MediaKamar::where('tipe_kamar', $tipe)->firstOrFail();
        return view('media_kamar.show', compact('mediaKamar'));
    }

    public function create()
    {
        return view('media_kamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe_kamar' => 'required|string',
            'harga' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:10240',
        ]);

        $data = [
            'tipe_kamar' => $request->tipe_kamar,
            'harga' => $request->harga,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('media_kamar/foto', 'public');
        }

        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('media_kamar/video', 'public');
        }

        MediaKamar::create($data);

        return redirect()->route('media_kamar.index')->with('success', 'Media kamar berhasil disimpan.');
    }

    public function destroy(MediaKamar $mediaKamar)
    {
        if ($mediaKamar->foto) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($mediaKamar->foto);
        }
        if ($mediaKamar->video) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($mediaKamar->video);
        }
        $mediaKamar->delete();

        return redirect()->route('media_kamar.index')->with('success', 'Media kamar berhasil dihapus.');
    }
}

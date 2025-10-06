<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\MediaKamar;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::latest()->paginate(10);
        return view('pesan.index', compact('pesans'));
    }

    public function create()
    {
        $mediaKamars = MediaKamar::all()->pluck('harga', 'tipe_kamar')->toArray();
        return view('pesan', ['prices' => $mediaKamars]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan'   => 'required|string|max:255',
            'jenis_kelamin'  => 'required',
            'nomor_identitas'=> 'required|digits:16',
            'tipe_kamar'     => 'required',
            'tanggal_check_in'  => 'required|date',
            'tanggal_check_out' => 'required|date|after:tanggal_check_in',
            'durasi'         => 'required|integer|min:1',
        ], [
            'nama_pemesan.required' => 'Nama pemesan wajib diisi.',
            'nama_pemesan.string' => 'Nama pemesan harus berupa teks.',
            'nama_pemesan.max' => 'Nama pemesan maksimal 255 karakter.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'nomor_identitas.required' => 'Nomor identitas wajib diisi.',
            'nomor_identitas.digits' => 'Nomor identitas harus 16 digit.',
            'tipe_kamar.required' => 'Tipe kamar wajib dipilih.',
            'tanggal_check_in.required' => 'Tanggal check in wajib diisi.',
            'tanggal_check_in.date' => 'Tanggal check in harus berupa tanggal yang valid.',
            'tanggal_check_out.required' => 'Tanggal check out wajib diisi.',
            'tanggal_check_out.date' => 'Tanggal check out harus berupa tanggal yang valid.',
            'tanggal_check_out.after' => 'Tanggal check out harus setelah tanggal check in.',
            'durasi.required' => 'Durasi wajib diisi.',
            'durasi.integer' => 'Durasi harus berupa angka.',
            'durasi.min' => 'Durasi minimal 1 malam.',
        ]);

        $checkIn = \Carbon\Carbon::parse($request->tanggal_check_in);
        $checkOut = \Carbon\Carbon::parse($request->tanggal_check_out);
        $durasi = $checkIn->diffInDays($checkOut);

        $harga = MediaKamar::where('tipe_kamar', $request->tipe_kamar)->value('harga') ?? 0;
        $total = $harga * $durasi;

        // Diskon 10% jika durasi lebih dari 3 hari
        if ($durasi > 3) {
            $total = $total * 0.9;
        }

        if ($request->has('breakfast')) {
            $total += 80000 * $durasi;
        }

        Pesan::create([
            'nama_pemesan'   => $request->nama_pemesan,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'nomor_identitas'=> $request->nomor_identitas,
            'tipe_kamar'     => $request->tipe_kamar,
            'tanggal_pesan'  => $request->tanggal_check_in,
            'tanggal_check_out' => $request->tanggal_check_out,
            'durasi'         => $durasi,
            'breakfast'      => $request->has('breakfast'),
            'total_harga'    => $total,
        ]);

        return redirect()->route('pesan.index')->with('success','Booking berhasil dibuat!');
    }

    public function show(Pesan $pesan)
    {
        return view('pesan.show', compact('pesan'));
    }



    public function update(Request $request, Pesan $pesan)
    {
        $request->validate([
            'nama_pemesan'   => 'required|string|max:255',
            'jenis_kelamin'  => 'required',
            'nomor_identitas'=> 'required|digits:16',
            'tipe_kamar'     => 'required',
            'tanggal_check_in'  => 'required|date',
            'tanggal_check_out' => 'required|date|after:tanggal_check_in',
            'durasi'         => 'required|integer|min:1',
        ], [
            'nama_pemesan.required' => 'Nama pemesan wajib diisi.',
            'nama_pemesan.string' => 'Nama pemesan harus berupa teks.',
            'nama_pemesan.max' => 'Nama pemesan maksimal 255 karakter.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'nomor_identitas.required' => 'Nomor identitas wajib diisi.',
            'nomor_identitas.digits' => 'Nomor identitas harus 16 digit.',
            'tipe_kamar.required' => 'Tipe kamar wajib dipilih.',
            'tanggal_check_in.required' => 'Tanggal check in wajib diisi.',
            'tanggal_check_in.date' => 'Tanggal check in harus berupa tanggal yang valid.',
            'tanggal_check_out.required' => 'Tanggal check out wajib diisi.',
            'tanggal_check_out.date' => 'Tanggal check out harus berupa tanggal yang valid.',
            'tanggal_check_out.after' => 'Tanggal check out harus setelah tanggal check in.',
            'durasi.required' => 'Durasi wajib diisi.',
            'durasi.integer' => 'Durasi harus berupa angka.',
            'durasi.min' => 'Durasi minimal 1 malam.',
        ]);

        $checkIn = \Carbon\Carbon::parse($request->tanggal_check_in);
        $checkOut = \Carbon\Carbon::parse($request->tanggal_check_out);
        $durasi = $checkIn->diffInDays($checkOut);

        $harga = MediaKamar::where('tipe_kamar', $request->tipe_kamar)->value('harga') ?? 0;
        $total = $harga * $durasi;

        // Diskon 10% jika durasi lebih dari 3 hari
        if ($durasi > 3) {
            $total = $total * 0.9;
        }

        if ($request->has('breakfast')) {
            $total += 80000 * $durasi;
        }

        $pesan->update([
            'nama_pemesan'   => $request->nama_pemesan,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'nomor_identitas'=> $request->nomor_identitas,
            'tipe_kamar'     => $request->tipe_kamar,
            'tanggal_pesan'  => $request->tanggal_check_in,
            'tanggal_check_out' => $request->tanggal_check_out,
            'durasi'         => $durasi,
            'breakfast'      => $request->has('breakfast'),
            'total_harga'    => $total,
        ]);

        return redirect()->route('pesan.index')->with('success','Booking berhasil diperbarui!');
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();
        return redirect()->route('pesan.index')->with('success','Booking berhasil dihapus!');
    }
}

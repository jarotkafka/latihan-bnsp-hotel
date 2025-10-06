@extends('layouts.app')

@section('title', 'Daftar Booking')

@section('content')
    <section class="container mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold mb-6 text-yellow-600">Daftar Booking</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
            <thead class="bg-yellow-500 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">No</th>
                    <th class="py-3 px-6 text-left">Nama Pemesan</th>
                    <th class="py-3 px-6 text-left">Jenis Kelamin</th>
                    <th class="py-3 px-6 text-left">Nomor Identitas</th>
                    <th class="py-3 px-6 text-left">Tipe Kamar</th>
                    <th class="py-3 px-6 text-left">Tanggal Check In</th>
                    <th class="py-3 px-6 text-left">Durasi (malam)</th>
                    <th class="py-3 px-6 text-left">Breakfast</th>
                    <th class="py-3 px-6 text-left">Total Harga</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesans as $pesan)
                    <tr class="border-b hover:bg-yellow-50">
                        <td class="py-3 px-6">{{ $loop->iteration }}</td>
                        <td class="py-3 px-6">{{ $pesan->nama_pemesan }}</td>
                        <td class="py-3 px-6">{{ $pesan->jenis_kelamin }}</td>
                        <td class="py-3 px-6">{{ $pesan->nomor_identitas }}</td>
                        <td class="py-3 px-6">{{ $pesan->tipe_kamar }}</td>
                        <td class="py-3 px-6">{{ \Carbon\Carbon::parse($pesan->tanggal_pesan)->format('d-m-Y') }}</td>
                        <td class="py-3 px-6">{{ $pesan->durasi }}</td>
                        <td class="py-3 px-6">{{ $pesan->breakfast ? 'Ya' : 'Tidak' }}</td>
                        <td class="py-3 px-6">Rp {{ number_format($pesan->total_harga, 0, ',', '.') }}</td>
                        <td class="py-3 px-6 text-center">
                            <form action="{{ route('pesan.destroy', $pesan->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus booking ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-6 text-gray-500">Belum ada booking.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6">
            {{ $pesans->links() }}
        </div>
    </section>
@endsection

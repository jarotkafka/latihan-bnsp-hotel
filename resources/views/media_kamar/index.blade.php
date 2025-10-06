@extends('layouts.app')

@section('title', 'Daftar Media Kamar')

@section('content')
<div class="max-w-6xl mx-auto p-8 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6">Daftar Media Kamar</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('media_kamar.create') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded mb-6 inline-block">
        Tambah Media Kamar
    </a>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-yellow-100">
                <th class="border border-gray-300 px-4 py-2">Tipe Kamar</th>
                <th class="border border-gray-300 px-4 py-2">Foto</th>
                <th class="border border-gray-300 px-4 py-2">Video</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mediaKamars as $media)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $media->tipe_kamar }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    @if($media->foto)
                        <img src="{{ asset('storage/' . $media->foto) }}" alt="Foto Kamar" class="w-32 h-auto rounded">
                    @else
                        Tidak ada foto
                    @endif
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    @if($media->video)
                        <video width="200" controls>
                            <source src="{{ asset('storage/' . $media->video) }}" type="video/mp4">
                            Browser Anda tidak mendukung video.
                        </video>
                    @else
                        Tidak ada video
                    @endif
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    <form action="{{ route('media_kamar.destroy', $media->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus media ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

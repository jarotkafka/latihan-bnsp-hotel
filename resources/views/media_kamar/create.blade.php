@extends('layouts.app')

@section('title', 'Upload Media Kamar')

@section('content')
<div class="max-w-4xl mx-auto p-8 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6">Upload Media Kamar</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('media_kamar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="tipe_kamar" class="block font-semibold mb-2">Tipe Kamar</label>
            <select name="tipe_kamar" id="tipe_kamar" class="w-full border rounded p-2" required>
                <option value="">Pilih Tipe Kamar</option>
                <option value="Standar">Standar</option>
                <option value="Deluxe">Deluxe</option>
                <option value="Family">Family</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="harga" class="block font-semibold mb-2">Harga (Rp)</label>
            <input type="number" name="harga" id="harga" class="w-full border rounded p-2" required min="0" step="1000">
        </div>

        <div class="mb-4">
            <label for="foto" class="block font-semibold mb-2">Foto Kamar</label>
            <input type="file" name="foto" id="foto" accept="image/*" class="w-full" />
        </div>

        <div class="mb-4">
            <label for="video" class="block font-semibold mb-2">Video Kamar</label>
            <input type="file" name="video" id="video" accept="video/*" class="w-full" />
        </div>

        <div class="text-center">
            <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-8 py-3 rounded-lg font-semibold transition">
                Upload Media
            </button>
        </div>
    </form>
</div>
@endsection

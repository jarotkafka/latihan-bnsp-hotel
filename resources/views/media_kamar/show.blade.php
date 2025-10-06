@extends('layouts.app')

@section('title', 'Detail Kamar ' . $mediaKamar->tipe_kamar)

@section('content')
    <section class="container mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold mb-6 text-yellow-600 text-center">{{ $mediaKamar->tipe_kamar }} Room</h1>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Gambar Kamar -->
            <div>
                <img src="{{ asset('images/' . strtolower($mediaKamar->tipe_kamar) . '.jpeg') }}" alt="{{ $mediaKamar->tipe_kamar }} Room"
                     class="w-full h-64 md:h-80 object-cover rounded-lg shadow-lg">
            </div>

            <!-- Detail Kamar -->
            <div>
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Detail Kamar</h2>
                <p class="text-gray-600 mb-4">
                    @if($mediaKamar->tipe_kamar == 'Standar')
                        Kamar yang nyaman dan terjangkau untuk menginap singkat dengan fasilitas dasar.
                    @elseif($mediaKamar->tipe_kamar == 'Deluxe')
                        Kamar luas dan bergaya dengan fasilitas premium dan desain elegan. Ideal untuk menginap panjang atau pasangan yang mencari kenyamanan ekstra.
                    @elseif($mediaKamar->tipe_kamar == 'Family')
                        Kamar luas dan nyaman, sempurna untuk keluarga yang ingin menikmati kenyamanan bersama dengan fasilitas lengkap.
                    @endif
                </p>
                <p class="text-lg font-bold text-yellow-600 mb-4">
                    Harga: Rp {{ number_format($mediaKamar->harga, 0, ',', '.') }}/malam
                </p>
                <a href="{{ route('pesan.create') }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                   Pesan Sekarang
                </a>
            </div>
        </div>

        <!-- Video YouTube -->
        <div class="mt-12">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800 text-center">Video Kamar</h2>
            <div class="flex justify-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/7sQ2EEBT3-s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen class="rounded-lg shadow-lg"></iframe>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('home') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition">
               Kembali ke Home
            </a>
        </div>
    </section>
@endsection

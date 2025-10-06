@extends('layouts.app')

@section('title', 'Town Towers - Luxury Hotel')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[80vh] md:h-[90vh] flex items-center justify-center text-center text-white"
             style="background-image: url('{{ asset('images/bghotel.jpeg') }}'); background-size: cover; background-position: center;">
        <div class="bg-black/60 absolute inset-0"></div>
        <div class="relative z-10 px-6">
            <h2 class="text-4xl md:text-6xl font-extrabold mb-4 md:mb-6 text-yellow-400 drop-shadow-lg">
                Town Towers
            </h2>
            <p class="text-lg md:text-2xl mb-6 md:mb-8 drop-shadow">Where Luxury Meets Comfort</p>
            <a href="{{ route('pesan.create') }}"
               class="bg-yellow-500 px-6 md:px-8 py-3 md:py-4 rounded-lg shadow-lg text-base md:text-lg font-semibold hover:bg-yellow-600 transition">
               Book Your Stay
            </a>
        </div>
    </section>

    <!-- Rooms -->
    <section id="rooms" class="container mx-auto px-6 py-20">
        <h3 class="text-3xl md:text-4xl font-bold mb-10 text-center text-yellow-500">Our Rooms</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Standard Room -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:scale-105 transition transform duration-300">
                <a href="{{ route('kamar.show', 'Standar') }}">
                    <img src="{{ asset('images/standar.jpeg') }}" alt="Standard Room"
                         class="w-full h-48 object-cover group-hover:brightness-90 cursor-pointer">
                </a>
                <div class="p-6">
                    <h4 class="text-xl font-semibold mb-2 text-gray-800">Standard Room</h4>
                    <p class="text-gray-600 text-sm mb-3">
                        Kamar yang nyaman dan terjangkau untuk menginap singkat dengan fasilitas dasar.
                    </p>
                    <ul class="text-gray-600 text-sm mb-4 space-y-1">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Queen-size bed</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Free Wi-Fi</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Air conditioning</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Television</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Private bathroom</li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('pesan.create') }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                           Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Deluxe Room -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:scale-105 transition transform duration-300">
                <a href="{{ route('kamar.show', 'Deluxe') }}">
                    <img src="{{ asset('images/deluxe.jpeg') }}" alt="Deluxe Room"
                         class="w-full h-48 object-cover group-hover:brightness-90 cursor-pointer">
                </a>
                <div class="p-6">
                    <h4 class="text-xl font-semibold mb-2 text-gray-800">Deluxe Room</h4>
                    <p class="text-gray-600 text-sm mb-3">
                        Kamar luas dan bergaya dengan fasilitas premium dan desain elegan. Ideal untuk menginap panjang atau pasangan yang mencari kenyamanan ekstra.
                    </p>
                    <ul class="text-gray-600 text-sm mb-4 space-y-1">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>King-size bed</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Free Wi-Fi & workspace</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Mini fridge & coffee maker</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>City view balcony</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Room service</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Bathrobe & slippers</li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('pesan.create') }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                           Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Family Room -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:scale-105 transition transform duration-300">
                <a href="{{ route('kamar.show', 'Family') }}">
                    <img src="{{ asset('images/family.jpeg') }}" alt="Family Room"
                         class="w-full h-48 object-cover group-hover:brightness-90 cursor-pointer">
                </a>
                <div class="p-6">
                    <h4 class="text-xl font-semibold mb-2 text-gray-800">Family Room</h4>
                    <p class="text-gray-600 text-sm mb-3">
                        Kamar luas dan nyaman, sempurna untuk keluarga yang ingin menikmati kenyamanan bersama dengan fasilitas lengkap.
                    </p>
                    <ul class="text-gray-600 text-sm mb-4 space-y-1">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>2 Queen-size beds</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Large living area</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Mini fridge & coffee maker</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Free Wi-Fi & TV</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Private bathroom with bathtub</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Balcony with city/garden view</li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('pesan.create') }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                           Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="bg-gray-50 py-20">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl md:text-4xl font-bold mb-10 text-center text-yellow-500">Room Pricing</h3>
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-yellow-500 text-white">
                        <tr>
                            <th class="py-4 px-6 text-left">Room Type</th>
                            <th class="py-4 px-6 text-left">Price per Night</th>
                            <th class="py-4 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6 font-semibold">Standard Room</td>
                            <td class="py-4 px-6">Rp 23.500.000</td>
                            <td class="py-4 px-6 text-center">
                                <a href="{{ route('pesan.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">Book Now</a>
                            </td>
                        </tr>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6 font-semibold">Deluxe Room</td>
                            <td class="py-4 px-6">Rp 25.900.000</td>
                            <td class="py-4 px-6 text-center">
                                <a href="{{ route('pesan.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">Book Now</a>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-6 font-semibold">Family Room</td>
                            <td class="py-4 px-6">Rp 35.600.000</td>
                            <td class="py-4 px-6 text-center">
                                <a href="{{ route('pesan.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">Book Now</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="p-6 bg-gray-100 text-center">
                    <a href="{{ route('pesan.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition">View Booking Table</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="container mx-auto px-6 py-20">
        <h3 class="text-3xl md:text-4xl font-bold mb-8 text-center text-yellow-500">About Town Towers</h3>
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div class="order-2 md:order-1">
                <p class="text-gray-700 leading-relaxed text-base md:text-lg mb-6">
                    Town Towers is a five-star luxury hotel located in the heart of the city.
                    With world-class facilities, elegant rooms, and exceptional service,
                    we provide an unforgettable experience for every guest.
                    Perfect for both business and leisure, Town Towers defines the art of hospitality.
                </p>
                <ul class="text-gray-600 text-sm space-y-2">
                    <li><i class="fas fa-star text-yellow-500 mr-2"></i>5-Star Luxury Accommodation</li>
                    <li><i class="fas fa-utensils text-yellow-500 mr-2"></i>Fine Dining Restaurants</li>
                    <li><i class="fas fa-swimming-pool text-yellow-500 mr-2"></i>Outdoor Swimming Pool</li>
                    <li><i class="fas fa-spa text-yellow-500 mr-2"></i>Spa & Wellness Center</li>
                    <li><i class="fas fa-parking text-yellow-500 mr-2"></i>Secure Parking Facilities</li>
                </ul>
            </div>
            <div class="order-1 md:order-2">
                <img src="{{ asset('images/hotel.jpeg') }}" alt="Town Towers Hotel Exterior"
                     class="w-full h-64 md:h-80 object-cover rounded-xl shadow-lg">
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="bg-gray-50 py-20">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl md:text-4xl font-bold mb-10 text-center text-yellow-500">Hotel Gallery</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/room.jpeg') }}" alt="Hotel Room" class="w-full h-48 object-cover">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/kolamhtl.jpeg') }}" alt="Hotel Pool" class="w-full h-48 object-cover">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/glryhtl1.jpeg') }}" alt="Hotel Gallery 1" class="w-full h-48 object-cover">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/hotel.jpeg') }}" alt="Hotel Exterior" class="w-full h-48 object-cover">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/restornthtl.jpeg') }}" alt="Hotel Restaurant" class="w-full h-48 object-cover">
                </div>
                <div class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <img src="{{ asset('images/restornhtl2.jpeg') }}" alt="Hotel Restaurant 2" class="w-full h-48 object-cover">
                </div>
            </div>
        </div>
    </section>
@endsection

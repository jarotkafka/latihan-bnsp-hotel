@extends('layouts.app')

@section('title', 'Booking - Crown Towers')

@section('content')
    <!-- Header Section -->
    <section class="relative h-64 md:h-80 flex items-center justify-center text-center text-white"
             style="background-image: url('{{ asset('images/hotel.jpeg') }}'); background-size: cover; background-position: center;">
        <div class="bg-black/40 absolute inset-0"></div>
        <div class="relative z-10 px-6">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-yellow-400 drop-shadow-lg">Book Your Stay</h1>
            <p class="text-lg md:text-xl drop-shadow">Experience luxury at Crown Towers</p>
        </div>
    </section>

    <!-- Booking Form -->
    <div class="max-w-4xl mx-auto bg-white p-8 md:p-12 rounded-2xl shadow-xl -mt-16 relative z-10 mb-12">
        <div class="flex justify-between items-center mb-8 border-b pb-4">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Reservation Details</h2>
            <a href="{{ route('home') }}"
               class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition">
                <i class="fas fa-arrow-left mr-2"></i>Back to Home
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pesan.store') }}" method="POST" id="bookingForm" class="space-y-8">
            @csrf

            <!-- Personal Information -->
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-user text-yellow-500 mr-3"></i> Personal Information
                </h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div>
                        <label class="block font-semibold mb-2 text-gray-700">Full Name</label>
                        <div class="relative">
                            <i class="fas fa-user absolute left-3 top-3 text-gray-400"></i>
                            <input type="text" name="nama_pemesan" placeholder="Enter your full name"
                                   class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3
                                          bg-white text-gray-800 placeholder-gray-400
                                          focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition"
                                   required>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block font-semibold mb-2 text-gray-700">Gender</label>
                        <div class="relative">
                            <i class="fas fa-venus-mars absolute left-3 top-3 text-gray-400"></i>
                            <select name="jenis_kelamin"
                                    class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3
                                           bg-white text-gray-800 placeholder-gray-400
                                           focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition"
                                    required>
                                <option value="">Select Gender</option>
                                <option value="Laki-laki">Male</option>
                                <option value="Perempuan">Female</option>
                            </select>
                        </div>
                    </div>

                    <!-- ID Number -->
                    <div class="md:col-span-2">
                        <label class="block font-semibold mb-2 text-gray-700">ID Number</label>
                        <div class="relative">
                            <i class="fas fa-id-card absolute left-3 top-3 text-gray-400"></i>
                            <input type="text" name="nomor_identitas" maxlength="16"
                                   placeholder="Enter your ID number (16 digits)"
                                   class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3
                                          bg-white text-gray-800 placeholder-gray-400
                                          focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition"
                                   required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Details -->
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-calendar-check text-yellow-500 mr-3"></i> Booking Details
                </h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Room Type -->
                    <div>
                        <label class="block font-semibold mb-2 text-gray-700">Room Type</label>
                        <div class="relative">
                            <i class="fas fa-bed absolute left-3 top-3 text-gray-400"></i>
                            <select name="tipe_kamar" id="tipe_kamar"
                                    class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3
                                           bg-white text-gray-800 placeholder-gray-400
                                           focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition"
                                    required>
                                <option value="">Select Room Type</option>
                                @foreach($prices as $type => $price)
                                    <option value="{{ $type }}">{{ $type }} - Rp {{ number_format($price, 0, ',', '.') }}/night</option>
                                @endforeach
                            </select>
                            <div id="hargaDisplay" class="mt-2 text-sm text-gray-600"></div>
                        </div>
                    </div>

                    <!-- Check-in Date -->
                    <div>
                        <label class="block font-semibold mb-2 text-gray-700">Check-in Date</label>
                        <div class="relative">
                            <i class="fas fa-calendar absolute left-3 top-3 text-gray-400"></i>
                            <input type="date" name="tanggal_check_in" id="tanggal_check_in"
                                   class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3
                                          bg-white text-gray-800 placeholder-gray-400
                                          focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition"
                                   min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}"
                                   max="{{ \Carbon\Carbon::today()->addYear()->format('Y-m-d') }}"
                                   required>
                        </div>
                    </div>

                    <!-- Check-out Date -->
                    <div>
                        <label class="block font-semibold mb-2 text-gray-700">Check-out Date</label>
                        <div class="relative">
                            <i class="fas fa-calendar absolute left-3 top-3 text-gray-400"></i>
                            <input type="date" name="tanggal_check_out" id="tanggal_check_out"
                                   class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3
                                          bg-white text-gray-800 placeholder-gray-400
                                          focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition"
                                   min="{{ \Carbon\Carbon::today()->addDay()->format('Y-m-d') }}"
                                   max="{{ \Carbon\Carbon::today()->addYear()->format('Y-m-d') }}"
                                   required>
                        </div>
                    </div>

                    <!-- Duration -->
                    <div>
                        <label class="block font-semibold mb-2 text-gray-700">Duration (Nights)</label>
                        <div class="relative">
                            <i class="fas fa-clock absolute left-3 top-3 text-gray-400"></i>
                            <input type="number" name="durasi" id="durasi" min="1" readonly
                                   placeholder="Auto calculated"
                                   class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-3
                                          bg-gray-100 text-gray-800 placeholder-gray-400"
                                   required>
                        </div>
                    </div>

                    <!-- Breakfast -->
                    <div class="flex items-center space-x-3 md:col-span-2">
                        <input type="checkbox" name="breakfast" id="breakfast"
                               class="w-5 h-5 text-yellow-600 focus:ring-yellow-500">
                        <label for="breakfast" class="font-semibold text-gray-700">
                            Include Breakfast (+ Rp 80.000/night)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Total Price -->
            <div class="bg-yellow-50 border border-yellow-200 p-6 rounded-lg">
                <div class="flex justify-between items-center">
                    <span class="text-xl font-semibold text-gray-800">Total Price:</span>
                    <span id="totalPrice" class="text-2xl font-bold text-yellow-600">Rp 0</span>
                </div>
                <p class="text-sm text-gray-600 mt-2" id="discountNote">Price includes room and selected options</p>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white px-8 py-4 rounded-lg shadow-lg text-lg font-semibold transition transform hover:scale-105">
                    <i class="fas fa-paper-plane mr-2"></i>Confirm Booking
                </button>
            </div>
        </form>
    </div>

    <script>
        // Price calculation
        const prices = {
            @foreach($prices as $type => $price)
            '{{ $type }}': {{ $price }},
            @endforeach
        };
        const breakfastPrice = 80000;

        function calculateDuration() {
            const checkIn = document.getElementById('tanggal_check_in').value;
            const checkOut = document.getElementById('tanggal_check_out').value;
            if (checkIn && checkOut) {
                const checkInDate = new Date(checkIn);
                const checkOutDate = new Date(checkOut);
                const diffTime = checkOutDate - checkInDate;
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                document.getElementById('durasi').value = diffDays > 0 ? diffDays : 0;
            }
        }

        function calculateTotal() {
            const roomType = document.getElementById('tipe_kamar').value;
            const duration = parseInt(document.getElementById('durasi').value) || 0;
            const breakfast = document.getElementById('breakfast').checked;

            let total = 0;
            if (roomType && prices[roomType]) {
                total = prices[roomType] * duration;
                if (breakfast) {
                    total += breakfastPrice * duration;
                }
                // Diskon 10% jika durasi lebih dari 3 hari
                if (duration > 3) {
                    total = total * 0.9;
                }
            }

            document.getElementById('hargaDisplay').textContent = roomType ? `Harga per malam: Rp ${prices[roomType].toLocaleString('id-ID')}` : '';
            document.getElementById('totalPrice').textContent = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('discountNote').textContent = duration > 3 ? 'Diskon 10% untuk menginap lebih dari 3 hari sudah diterapkan' : 'Harga sudah termasuk kamar dan opsi yang dipilih';
        }

        // Event listeners
        document.getElementById('tipe_kamar').addEventListener('change', calculateTotal);
        document.getElementById('tanggal_check_in').addEventListener('change', function() {
            calculateDuration();
            calculateTotal();
        });
        document.getElementById('tanggal_check_out').addEventListener('change', function() {
            calculateDuration();
            calculateTotal();
        });
        document.getElementById('breakfast').addEventListener('change', calculateTotal);

        // Initialize Flatpickr date pickers
        const today = new Date();
        const oneYearLater = new Date();
        oneYearLater.setFullYear(today.getFullYear() + 1);

        const checkInPicker = flatpickr("#tanggal_check_in", {
            dateFormat: "Y-m-d",
            minDate: today,
            maxDate: oneYearLater,
            onChange: function(selectedDates, dateStr, instance) {
                const checkInDate = new Date(dateStr);
                const nextDay = new Date(checkInDate);
                nextDay.setDate(checkInDate.getDate() + 1);
                checkOutPicker.set('minDate', nextDay);
                if (checkOutPicker.selectedDates.length > 0 && checkOutPicker.selectedDates[0] <= checkInDate) {
                    checkOutPicker.setDate(nextDay);
                }
                calculateDuration();
            }
        });

        const checkOutPicker = flatpickr("#tanggal_check_out", {
            dateFormat: "Y-m-d",
            minDate: today,
            maxDate: oneYearLater,
            onChange: calculateDuration
        });
    </script>
@endsection

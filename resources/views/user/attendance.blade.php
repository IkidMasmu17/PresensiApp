@extends('user.layouts')

@section('content')

    <!-- HTML5 QR Code Library -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Scan ID Card</h1>
            <p class="text-gray-500 mt-2">
                Silakan scan QR Code pada ID Card Anda untuk melakukan presensi.
            </p>
            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold mt-3">
                {{ date('l, d F Y') }}
            </span>
        </div>

        <!-- Scanner Container -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">

            <!-- Pesan Status -->
            <div id="msg"></div>

            <!-- Camera Area -->
            <div id="reader" class="overflow-hidden rounded-xl border-2 border-dashed border-gray-300 bg-gray-50"></div>

            <!-- Manual Info (Hidden/Visible mainly for debugging or fallback info) -->
            <input type="hidden" id="user_id_session" value="{{ session('user_id') }}">

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-400">Pastikan ID Card terlihat jelas di kamera.</p>
                <a href="{{ url('user/home') }}"
                    class="inline-block mt-4 text-sm text-blue-600 hover:text-blue-800 font-medium">
                    &larr; Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            console.log(`Scan result: ${decodedText}`, decodedResult);

            let sessionUserId = document.getElementById('user_id_session').value;

            // Cek ID yang discan apakah sesuai dengan user login
            // Asumsi QR Code berisi User ID (angka)

            if (decodedText == sessionUserId) {
                // Stop scanning
                html5QrcodeScanner.clear();

                // Tampilkan loading
                $("#msg").html(`
                    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4 flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memproses Absensi...
                    </div>
                `);

                // Panggil Geolocation untuk validasi lokasi (Sesuai Layout Main)
                if ("geolocation" in navigator) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        let lat = position.coords.latitude;
                        let long = position.coords.longitude;

                        // Kirim ke backend
                        processAttendance(decodedText, lat, long);
                    }, function (error) {
                        $("#msg").html(`
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <strong class="font-bold">Error Lokasi!</strong>
                                <span class="block sm:inline">Gagal mendapatkan lokasi. Pastikan GPS aktif.</span>
                                <button onclick="window.location.reload()" class="underline mt-2">Coba Lagi</button>
                            </div>
                        `);
                    });
                } else {
                    $("#msg").html(`
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            Browser tidak mendukung Geolocation.
                        </div>
                    `);
                }

            } else {
                // ID Card Salah
                // Kita alert tapi tidak stop scanner, biar user bisa coba lagi
                $("#msg").html(`
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Validasi Gagal!</strong>
                        <span class="block sm:inline">QR Code ini bukan milik Anda (ID Logged: ${sessionUserId} vs Scan: ${decodedText}).</span>
                    </div>
                `);
            }
        }

        function processAttendance(userId, lat, long) {
            // Reuse logic from layout ajax, or direct call here
            // We will do direct AJAX here for simplicity and isolation from layout's button click logic

            let latTarget = -6.8789533; // Koordinat Sekolah
            let longTarget = 107.5891104;

            // Calculate Distance Logic (Ported from layout)
            function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
                var R = 6371;
                var dLat = deg2rad(lat2 - lat1);
                var dLon = deg2rad(lon2 - lon1);
                var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                var d = R * c;
                return d;
            }

            function deg2rad(deg) { return deg * (Math.PI / 180); }

            let distance = getDistanceFromLatLonInKm(latTarget, longTarget, lat, long);

            if (Math.floor(distance) > 1) { // 1 KM Radius Tolerance
                $("#msg").html(`
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Di Luar Jangkauan!</strong>
                        <span class="block sm:inline">Anda berada ${distance.toFixed(2)} km dari lokasi absen.</span>
                    </div>
                `);
            } else {
                // POST to Backend
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    dataType: 'json',
                    type: "POST",
                    url: "/doAttendance",
                    data: { user_id: userId },
                    success: function (data) {
                        if (data.status == true) { // Sudah absen
                            $("#msg").html(`<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4">${data.message}</div>`);
                        } else { // Berhasil absen
                            $("#msg").html(`<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">${data.message}</div>`);
                        }
                    },
                    error: function (err) {
                        $("#msg").html(`<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">Terjadi kesalahan pada server.</div>`);
                    }
                });
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    </script>

@endsection
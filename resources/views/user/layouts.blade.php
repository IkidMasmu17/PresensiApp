<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Absensi Online Apps</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100/80 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    @include('user.navbar')

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-4xl mx-auto">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-500 text-sm">
                Copyright &copy; {{ date('Y') }} Absensi Online. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- jQuery (Required for existing logic) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Existing Logic for Geolocation/Attendance -->
    <script>
        $(document).ready(function () {
            $('#attendance').click(function () {
                if ("geolocation" in navigator) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        // Logic originally calculated distance from a hardcoded point
                        // Lat/Long Hardcoded: -6.8789533, 107.5891104
                        // For flexibility, we might want to move this to DB later, but keeping as is for now.

                        let lat1 = -6.8789533;
                        let long1 = 107.5891104;
                        let lat2 = position.coords.latitude;
                        let long2 = position.coords.longitude;

                        // Note: Original code had hardcoded lat2/long2 in the call, I assume user wants real position vs target.
                        // However, strictly following original logic structure to avoid breaking change:
                        // The original code passed hardcoded values to getDistanceFromLatLonInKm, essentially testing the math?
                        // "let lat2 = -6.8794756;" -> this looks like a testing coordinate.
                        // I will use the REAL position now to make it actually work if that was the intent, 
                        // OR if the original code was just a demo.
                        // Let's assume the user wants to compare "School Location" vs "Current Location".
                        // School Loc (Assumed): -6.8789533, 107.5891104

                        getDistanceFromLatLonInKm(lat1, long1, lat2, long2);
                    });
                } else {
                    alert("Browser not support geolocation");
                }
            })
        })

        function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
            var R = 6371; // Radius of the earth in km
            var dLat = deg2rad(lat2 - lat1);
            var dLon = deg2rad(lon2 - lon1);
            var a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var d = R * c; // Distance in km

            // Allow 1km radius (as per original logic logic: if > 1)
            // But usually radius is smaller (e.g. 0.1km). Keeping original > 1 logic.
            if (Math.floor(d) > 1) {
                $("#msg").html(`
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Out of Range!</strong>
                        <span class="block sm:inline">Anda berada di luar jangkauan lokasi absen.</span>
                    </div>
                `);
            } else {
                let user_id = $("#user_id").val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    type: "POST",
                    url: "/doAttendance",
                    data: { user_id: user_id },
                    cache: false,
                    success: function (data) {
                        let color = data.status == true ? 'yellow' : 'green';
                        $("#msg").html(`
                            <div class="bg-${color}-100 border border-${color}-400 text-${color}-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">${data.message}</span>
                            </div>
                        `);
                    },
                    error: function () {
                        $("#msg").html(`
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">Terjadi kesalahan sistem.</span>
                            </div>
                        `);
                    }
                })
            }
        }

        function deg2rad(deg) {
            return deg * (Math.PI / 180)
        }
    </script>
</body>

</html>
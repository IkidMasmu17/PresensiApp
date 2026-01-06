<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard | PresensiApp</title>

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            bg: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="bg-gray-50 text-slate-900 overflow-hidden" x-data="{ open: true, userOpen: false }">

    <!-- Main Wrapper -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Content Area -->
        <div class="flex-grow flex flex-col min-w-0">

            <!-- Topbar -->
            @include('layouts.topbar')

            <!-- Page Content -->
            <main class="flex-grow overflow-y-auto px-6 lg:px-10 py-8">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-100 py-4 px-10">
                <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                    <p>Copyright &copy; {{ date('Y') }} PresensiApp. All rights reserved.</p>
                    <div class="flex space-x-4 mt-2 md:mt-0">
                        <a href="#" class="hover:text-indigo-600 transition">Privacy Policy</a>
                        <a href="#" class="hover:text-indigo-600 transition">Terms of Service</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Global Custom JS -->
    <script>
        $(document).ready(function () {
            // Placeholder for global interactive logic if needed
        });
    </script>

    @stack('scripts')

</body>

</html>
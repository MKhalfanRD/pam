<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <style>
        /* Pastikan sidebar memiliki z-index lebih tinggi */
        #sidebar {
            z-index: 10;
        }
        /* Agar konten tetap di belakang sidebar */
        #content {
            z-index: 1;
        }
    </style>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <div class="fixed top-0 left-0 w-64 h-full bg-gray-800 text-white p-6 transform -translate-x-full transition-transform" id="sidebar">
        <div class="flex items-center mb-6 cursor-pointer" id="toggleSidebarSidebar">
            <img src="{{ asset('path_to_your_profile_image.jpg') }}" alt="Profile" class="w-10 h-10 rounded-full mr-2">
        </div>

        <!-- Menu -->
        @if($role == 'operator')
            <a href="{{ route('operator.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard Operator</a>
            <a href="{{ route('operator.upload') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Upload Foto Tagihan</a>
        @endif

        @if($role == 'warga')
            <a href="{{ route('warga.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard Warga</a>
            <a href="{{ route('warga.tagihan') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Lihat Tagihan</a>
            <a href="{{ route('warga.pembayaran') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Konfirmasi Pembayaran</a>
        @endif

        @if($role == 'admin')
            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard Admin</a>
            <a href="{{ route('admin.verifikasi') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Verifikasi Pembayaran</a>
        @endif
    </div>

    <!-- Tombol untuk toggle sidebar -->
    <div class="py-2 md:hidden">
        <button id="toggleSidebar" class="bg-gray-800 text-white rounded flex items-center">
            <img src="{{ asset('path_to_your_profile_image.jpg') }}" alt="Profile" class="w-8 h-8 rounded-full">
        </button>
    </div>

    <!-- Content -->
    <div id="content" class="flex-grow px-6 transition-all duration-300">
        @yield('content')
    </div>

    <script>
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        // Menangani klik pada logo profil di sidebar
        document.getElementById('toggleSidebarSidebar').addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        // Menangani klik pada tombol untuk toggle sidebar
        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
</body>
</html>

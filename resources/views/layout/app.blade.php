<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <script src="//unpkg.com/alpinejs" defer></script>

    @vite('resources/css/app.css')
</head>
<body>
    <nav class="px-4 py-4" x-data="{ navOpen: false }">
        <div class="container mx-auto">
            <!-- Small Screen Navbar -->
            <div class="flex items-center justify-between lg:hidden">
                <h1 class="text-xl text-white font-semibold">PDAM</h1>
                <button @click="navOpen = !navOpen">
                    <img src="{{ asset('icon/logo_pdam.png') }}" alt="toggle" class="w-7">
                </button>
            </div>
            <!-- Large Screen Navbar -->
            <div class="hidden lg:flex lg:items-center lg:justify-between">
                <div class="flex items-center gap-4">
                    <button @click="navOpen = !navOpen">
                        <img src="{{ asset('icon/logo_pdam.png') }}" alt="toggle" class="w-7">
                    </button>
                    <h1 class="text-xl text-white font-semibold">PDAM</h1>
                </div>
                <ul class="flex gap-10">
                    <li class="font-bold text-sm text-gray-400"><a href="#">Home</a></li>
                    <li class="font-bold text-sm text-gray-400"><a href="#">About</a></li>
                    <li class="font-bold text-sm text-gray-400"><a href="#">Business</a></li>
                    <li class="font-bold text-sm text-gray-400"><a href="#">Services</a></li>
                </ul>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="fixed bottom-0 right-0 left-0 p-4 lg:hidden bg-indigo-600 z-50" x-show="navOpen"
            x-transition.duration.500ms>
            <ul class="flex justify-between">
                <li>
                    <button class="flex flex-col items-center gap-1">
                        <span class="font-bold text-base text-white">Home</span>
                    </button>
                </li>
                <li>
                    <button class="flex flex-col items-center gap-1">
                        <span class="font-normal text-base text-white">About</span>
                    </button>
                </li>
                <li>
                    <button class="flex flex-col items-center gap-1">
                        <span class="font-normal text-base text-white">Business</span>
                    </button>
                </li>
                <li>
                    <button class="flex flex-col items-center gap-1">
                        <span class="font-normal text-base text-white">Services</span>
                    </button>
                </li>
            </ul>
        </div>
    </nav>

    <section>
        <div class="col-span-12">
            @yield('content')
        </div>
    </section>
</body>
</html>

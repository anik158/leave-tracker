<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<header class="bg-white shadow">
    <div class="container mx-auto py-4 px-8 flex justify-between items-center">
        <h1 class="text-xl font-bold">Admin Panel</h1>
        <div>
            <!-- User Profile Dropdown (if user is logged in) -->
            <div class="relative inline-block text-left">
                <span class="rounded-md shadow-sm">
                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-gray-700" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        Username
                        <!-- Heroicon name: solid/chevron-down -->
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 12a1 1 0 01-.707-.293l-4-4a1 1 0 111.414-1.414L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-.707.293z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </span>
                <!-- Dropdown menu, show/hide based on menu state. -->
                <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<nav class="bg-gray-800 text-white">
    <div class="container mx-auto py-4 px-8 flex justify-center">
        <ul class="flex space-x-4">
            <li><a href="#" class="hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a></li>
            <li><a href="#" class="hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">User Management</a></li>
            <li><a href="#" class="hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Leave Requests</a></li>
            <li><a href="#" class="hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Leave History</a></li>
            <li><a href="#" class="hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Settings</a></li>
        </ul>
    </div>
</nav>


<!-- Main Content -->
<main class="container mx-auto py-8">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white">
    <div class="container mx-auto py-4 px-8">
        <div class="flex justify-between items-center">
            <div>&copy; 2024 Ahsan</div>
            <div>
                <a href="#" class="text-gray-400 hover:text-white mr-4">Terms of Service</a>
                <a href="#" class="text-gray-400 hover:text-white mr-4">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white">Contact Us</a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>

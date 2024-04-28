@extends('layouts.admin_layout')

@section('content')
    <div class="container mx-auto">
        <header class="bg-gray-800 py-4">
            <!-- Include the navigation component -->
            @include('layouts.navigation')
        </header>

        <main class="my-4">
            <form action="#" class="mb-4">
                <input type="text" placeholder="Search users..." class="border border-gray-300 px-4 py-2 rounded-md">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2">Search</button>
            </form>

            <table class="w-full">
                <thead>
                <tr>
                    <th class="py-2">Name</th>
                    <th class="py-2">Email</th>
                    <th class="py-2">Role</th>
                    <th class="py-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                <!-- Add user data dynamically here -->
                </tbody>
            </table>
        </main>

        <footer class="bg-gray-800 py-4 mt-8">
            <div class="text-center text-white">Footer Content</div>
        </footer>
    </div>
@endsection

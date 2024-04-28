<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('successMessage'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('successMessage') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Quick Links Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">Quick Links</h3>
                    <ul class="list-disc ml-5">
                        <li><a href="{{ route('leave-request.create') }}">Submit Leave Request</a></li>
                        <li><a href="{{ route('leave-history.index') }}">View Leave History</a></li>
                    </ul>
                </div>
            </div>

            <!-- Admin Panel Card -->
            @if (Auth::user()->role == 'admin')
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold">Admin Panel</h3>
                        <ul class="list-disc ml-5">
                            <li><a href="{{ route('leave-approval.index') }}">Review Leave Requests</a></li>
                            <li><a href="{{ route('user-management.index') }}">Manage User Accounts</a></li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>

</x-app-layout>

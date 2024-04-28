<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Submit Leave Request') }}
        </h2>
    </x-slot>

    <div id="leave_request">
        <leave-request :action-url="'{{ route('leave-request.store') }}'" :success-message="'{{ session('successMessage') }}'"></leave-request>
    </div>
</x-app-layout>

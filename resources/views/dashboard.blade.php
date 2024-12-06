<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center">
                        @if(Auth::user()->profile_picture)
                        <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture" class="w-16 h-16 rounded-full mr-4">
                        @else
                        <img src="{{ asset('/build/assets/mia.jpg') }}" alt="Default Profile Picture" class="w-20 h-20 mr-8 mb-5">
                        @endif
                    </div>

                    <div>
                            <h3 class="text-lg font-bold">Name: {{ Auth::user()->name }}</h3>
                            <p class="text-gray-600">Google ID: {{ Auth::user()->google_id }}</p>
                            <p class="text-gray-600">Email: {{ Auth::user()->email }}</p>
                        </div>
                    <div class="mt-4 text-right"> <i>Thank you for logging in, {{ Auth::user()->name }}!</i>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
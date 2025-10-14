@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <x-card>
        <h1 class="text-2xl font-bold mb-4">Settings</h1>
        <p class="text-gray-600 dark:text-gray-300 mb-6">
            Here you can manage platform configuration, site name, bidding rules, etc.
        </p>

        <!-- Settings Form -->
        <form class="space-y-6">
            <div>
                <label class="block mb-2 font-medium dark:text-white">Site Name</label>
                <input type="text" class="w-full border dark:border-gray-700 rounded px-4 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-white" value="Bidding System Platform">
            </div>

            <div>
                <label class="block mb-2 font-medium dark:text-white">Max Bid Limit</label>
                <input type="number" class="w-full border dark:border-gray-700 rounded px-4 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-white" value="10000">
            </div>

            <div class="flex justify-between items-center">
                <!-- Theme Button -->
                <button type="button" onclick="toggleTheme()" class="px-4 py-2 rounded bg-gray-300 dark:bg-gray-700 dark:text-white shadow">
                    <span id="theme-icon">🌞</span> Theme
                </button>

                <!-- Save Button -->
                <x-button>
                    Save Settings
                </x-button>
            </div>
        </form>
    </x-card>
</div>
@endsection

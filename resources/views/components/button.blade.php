<button {{ $attributes->merge(['class' => 'px-4 py-2 bg-indigo-600 text-white dark:bg-indigo-500 dark:text-white rounded hover:bg-indigo-700 dark:hover:bg-indigo-600']) }}>
    {{ $slot }}
</button>

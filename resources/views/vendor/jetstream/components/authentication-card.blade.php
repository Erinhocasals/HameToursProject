<div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-4/5 sm:w-full px-6 py-4 mt-6 overflow-hidden sm:max-w-md card">
        {{ $slot }}
    </div>
</div>

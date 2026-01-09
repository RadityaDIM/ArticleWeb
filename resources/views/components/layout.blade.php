@props(['fullWidth' => false, 'hideHeader' => false])
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ strip_tags($title) }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</head>

<body class="h-full">

    <div class="min-h-full flex flex-col">
        <x-navbar></x-navbar>
        @unless ($hideHeader)
            <x-header>{{ $title }}</x-header>
        @endunless

        <main class="flex-1">

            @if ($fullWidth)
                <div class="w-full">
                    {{ $slot }}
                </div>
            @else
                <div class="mx-auto max-w-8xl px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            @endif
            {{-- <div class="mx-auto max-w-8xl py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div> --}}
        </main>
    </div>

</body>



</html>

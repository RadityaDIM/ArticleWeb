<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>


    {{-- <article class="py-8 max-w-3xl border-b ">
        <h2 class="mb-2 text-3xl font-bold tracking-tight text-gray-900">{{ $post['title'] }}</h2>
        </a>
        <div class=" text-base text-gray-500">
            <a href="#">{{ $post->author->name }}</a> | {{ $post->created_at->format('j F Y') }}
        </div>
        <p class="my-5 font-light">
            {{ $post['body'] }}
        </p>
        <a href="/posts" class="font-medium text-blue-500"> &laquo; Back to posts</a>

    </article> --}}


    <main class="mx-auto mt-10 mb-30 pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-7xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('icon.jpg') }}" alt="">

                            <div>
                                <a href="../author/{{ $post->author->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">{{ $post->author->role->name }}
                                </p>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    {{ $post->created_at->format('j F Y') }}</p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title }}</h1>
                </header>
                <div class="">
                    <hr class="h-px my-2 bg-linear-to-r from-transparent via-white to-transparent border-0 opacity-100">
                    <p class="text-justify  ">{{ $post->body }}</p>
                </div>
            </article>
        </div>
    </main>

</x-layout>

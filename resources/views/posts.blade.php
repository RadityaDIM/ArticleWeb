<x-layout>
    <x-slot:title>
        {{ $title }}</x-slot:title>
    <div class="flex justify-between">
        {{-- div filter --}}
        <div class=" my-auto">
            @isset($categories)
                <div>
                    <form action="/posts" method="GET" id="filterForm">
                        <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            type="button">
                            Filter by category
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-semibold text-gray-900 dark:text-white">Category</h6>
                            <ul class="space-y-2 text-sm">
                                @isset($categories)
                                    @foreach ($categories as $category)
                                        <li class="flex items-center">
                                            <input id="cat-{{ $category->id }}" name="category[]" type="checkbox"
                                                value="{{ $category->slug }}" {{-- Menjaga agar checkbox tetap tercentang setelah reload --}}
                                                {{ in_array($category->slug, (array) request('category')) ? 'checked' : '' }}
                                                onchange="document.getElementById('filterForm').submit()"
                                                class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500">

                                            <label for="cat-{{ $category->id }}"
                                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">
                                                {{ $category->name }}
                                            </label>
                                        </li>
                                    @endforeach
                                @endisset
                            </ul>

                            @if (request('category'))
                                <a href="/posts" class="block mt-3 text-xs text-center text-red-600 hover:underline">Clear
                                    Filters</a>
                            @endif
                        </div>
                    </form>
                </div>
            @endisset
        </div>
        <div class="w-2xl mx-0">
            <x-search></x-search>
        </div>
    </div>
    {{-- </x-slot:title> --}}



    <div class=" mx-auto max-w-7xl ">
        <div class="grid gap-5 lg:grid-cols-2">
            @forelse ($posts as $post)
                <div class="my-1">
                    <article
                        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <a href="/posts?category={{ $post->category->slug }}">
                                <span style="background-color: {{ $post->category->color }}"
                                    class="bg-primary-200 text-white text-xs border-0 font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-white">
                                    {{ $post->category->name }}
                                </span>
                            </a>
                            <span class="text-sm"> {{ $post->created_at->diffForHumans() }}
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="/posts/{{ $post['slug'] }}"
                                class="line-clamp-1 ... hover:text-cyan-300">{{ $post->title }}</a>
                        </h2>
                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400 line-clamp-2">
                            {{ $post->body }}
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                {{-- <img class="w-7 h-7 rounded-full"
                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                    alt="Jese Leos avatar" /> --}}
                                <a href="/posts?author={{ $post->author->username }}">
                                    <span
                                        class="font-medium dark:text-white hover:text-red-600 transition-colors duration-200">
                                        {{ $post->author->name }}
                                    </span></a>

                            </div>
                            <a href="/posts/{{ $post['slug'] }}"
                                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-20">
                    <svg class="w-20 h-20 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="none"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z"
                            clip-rule="evenodd" />
                    </svg>
                    <h2 class="text-xl font-bold text-primary-500 my-5">Pencarian kosong</h2>



                </div>
            @endforelse
        </div>
    </div>
    <div class="my-20 mx-auto max-w-3xl">
        {{ $posts->links() }}
    </div>
    </div>
</x-layout>

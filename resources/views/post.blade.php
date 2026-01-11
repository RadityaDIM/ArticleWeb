<x-layout fullWidth="true">
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <main class="mx-auto mt-10 mb-5 pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between mx-auto max-w-7xl ">
            <article
                class="mx-auto w-full max-w-5xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 mx-auto lg:mb-6 not-format sm:px-10">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center px-2 mr-3 text-sm   text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full sm:w-10 sm:h-10" src="{{ asset('icon.jpg') }}"
                                alt="">

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
                    @if ($post->image)
                        <img class="w-full h-100 object-cover rounded-2xl sm:px-5"
                            src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                    @else
                        <div
                            class="w-full h-96 rounded-lg bg-gray-200 flex items-center justify-center dark:bg-gray-700">

                            <svg class="w-12 h-12 text-gray-400 dark:text-gray-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path
                                    d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                            </svg>

                        </div>
                    @endif
                    <h1
                        class="mt-5 mb-1 text-3xl font-extrabold leading-tight text-gray-900 lg:text-4xl dark:text-white">
                        {{ $post->title }}</h1>
                    <p>From {{ $post->category->name }} Category</p>

                </header>
                <div class="sm:px-10">
                    <hr class="h-1 bg-linear-to-r from-transparent via-white to-transparent border opacity-100">
                    <p class="text-justify whitespace-pre-line ">{{ $post->body }}</p>
                </div>
            </article>
        </div>
    </main>

    @if ($post->author_id == auth()->id())
        <div class="flex justify-end items-center">
            <div class="relative">
                <button type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="editModal" data-hs-overlay="#editModal">
                    Update post
                </button>
                <button type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-vertically-centered-modal"
                    data-hs-overlay="#hs-vertically-centered-modal">
                    Delete post
                </button>
            </div>
        </div>
    @endif

    <div id="hs-vertically-centered-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-vertically-centered-modal-label">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
            <div
                class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div
                    class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                    <h3 id="hs-vertically-centered-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Delete your post
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-vertically-centered-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <p class="text-gray-800 dark:text-neutral-400">
                        Are you sure to delete this post?
                    </p>
                </div>
                <div
                    class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#hs-vertically-centered-modal">
                        Close
                    </button>
                    <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                            Delete post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <x-editModal :categories="$categories" :post="$post"></x-editModal>
</x-layout>

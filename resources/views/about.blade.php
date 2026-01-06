<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="">
        <x-feature></x-feature>
    </div>

    <div class="my-20">
        <div class="overflow-hidden bg-white dark:bg-gray-900 py-24 sm:py-32 rounded-2xl">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div
                    class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                    <div class="lg:pt-4 lg:pr-8">
                        <div class="lg:max-w-lg">
                            <h2 class="text-base/7 font-semibold text-blue-700 dark:text-indigo-400">ArticleWeb</h2>
                            <p
                                class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-black dark:text-white sm:text-5xl">
                                Publish with ease</p>
                            <p class="mt-6 text-lg/8 text-black dark:text-gray-300">A powerful platform designed for
                                creators to share ideas, manage categories, and engage with readers through a seamless
                                publishing experience.</p>
                            <dl class="mt-10 max-w-xl space-y-8 text-base/7 text-gray-400 lg:max-w-none">
                                <div class="relative pl-9">
                                    <dt class="inline font-semibold text-black dark:text-white">
                                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                            class="absolute top-1 left-1 size-5 text-blue-700 dark:text-indigo-400">
                                            <path
                                                d="M5.5 17a4.5 4.5 0 0 1-1.44-8.765 4.5 4.5 0 0 1 8.302-3.046 3.5 3.5 0 0 1 4.504 4.272A4 4 0 0 1 15 17H5.5Zm3.75-2.75a.75.75 0 0 0 1.5 0V9.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0l-3.25 3.5a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z"
                                                clip-rule="evenodd" fill-rule="evenodd" />
                                        </svg>
                                        Rapid Publishing
                                    </dt>
                                    <dd class="inline">Create and publish your posts instantly using our optimized
                                        modal-based editor.
                                    </dd>
                                </div>
                                <div class="relative pl-9">
                                    <dt class="inline font-semibold text-black dark:text-white">
                                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                            class="absolute top-1 left-1 size-5 text-blue-700 dark:text-indigo-400">
                                            <path
                                                d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1Zm3 8V5.5a3 3 0 1 0-6 0V9h6Z"
                                                clip-rule="evenodd" fill-rule="evenodd" />
                                        </svg>
                                        Organized Categories
                                    </dt>
                                    <dd class="inline">Keep your content structured with a dynamic category system for
                                        better discoverability.</dd>
                                </div>
                                <div class="relative pl-9">
                                    <dt class="inline font-semibold text-black dark:text-white">
                                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                            class="absolute top-1 left-1 size-5 text-blue-700 dark:text-indigo-400">
                                            <path
                                                d="M4.632 3.533A2 2 0 0 1 6.577 2h6.846a2 2 0 0 1 1.945 1.533l1.976 8.234A3.489 3.489 0 0 0 16 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234Z" />
                                            <path
                                                d="M4 13a2 2 0 1 0 0 4h12a2 2 0 1 0 0-4H4Zm11.24 2a.75.75 0 0 1 .75-.75H16a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75h-.01a.75.75 0 0 1-.75-.75V15Zm-2.25-.75a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75h-.01Z"
                                                clip-rule="evenodd" fill-rule="evenodd" />
                                        </svg>
                                        Secure Management
                                    </dt>
                                    <dd class="inline">Full control over your posts with author-based authorization for
                                        editing and deleting content.</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <img width="2432" height="1442" src="{{ asset('news.jpg') }}" alt="News Image"
                        class="w-3xl max-w-none rounded-xl shadow-xl ring-1 ring-white/10 sm:w-228 md:-ml-4 lg:ml-0" />
                </div>
            </div>
        </div>

    </div>

</x-layout>

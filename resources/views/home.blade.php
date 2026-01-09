<x-layout full-width hide-header>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <div>
        <section class="relative h-screen w-full overflow-hidden bg-white dark:bg-gray-900">
            <div class="absolute inset-0 z-0">

                <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover z-0">
                    <source src="{{ asset('newspaper-loop.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="absolute inset-0 z-10 bg-black/60"></div>
            <div
                class="relative z-20 h-screen px-4 mx-auto max-w-7xl text-center lg:py-16 lg:px-12 flex flex-col justify-center items-center">
                <a href="/posts"
                    class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
                    role="alert">
                    <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span
                        class="text-sm font-medium">Article is out! See what's new</span>
                    <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <div class="my-5">
                    <h1
                        class="mb-10 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                        Unlock a World of Knowledge</h1>
                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                        Coding tutorials, sharing inspiration, and perspectives.</p>
                </div>
                <div
                    class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                    <a href="/posts"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                        Start Reading
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="/posts?open_modal=true"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Make an article
                    </a>
                </div>
            </div>
        </section>
    </div>

    <div class="">
        <div class="">
            <div class="mx-auto max-w-7xl  sm:px-6 sm:py-10 lg:px-8">
                <div
                    class="relative isolate overflow-hidden bg-gray-800 px-6  after:pointer-events-none after:absolute after:inset-0 after:inset-ring after:inset-ring-white/10 sm:rounded-3xl sm:px-16 after:sm:rounded-3xl md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
                    <svg viewBox="0 0 1024 1024" aria-hidden="true"
                        class="absolute top-1/2 left-1/2 -z-10 size-256 -translate-y-1/2 mask-[radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0">
                        <circle r="512" cx="512" cy="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)"
                            fill-opacity="0.7" />
                        <defs>
                            <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                                <stop stop-color="#7775D6" />
                                <stop offset="1" stop-color="#E935C1" />
                            </radialGradient>
                        </defs>
                    </svg>
                    <div
                        class=" mx-auto max-w-md text-center sm:mt-10 md:my-20 lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
                        <h2 class="text-3xl font-semibold tracking-tight text-balance text-white sm:text-l ">Selamat
                            datang di Article Web.</h2>
                        <p class="mt-6 text-lg/8 text-pretty text-gray-300 sm: text-">Temukan perspektif yang berarti.
                            Sumber
                            harianmu untuk inspirasi, analisis mendalam, dan cerita yang memicu rasa ingin tahu.</p>

                        <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                            <a href="/posts"
                                class="rounded-md bg-gray-700 px-3.5 py-2.5 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-gray-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                                Get started </a>
                            <a href="#" class="text-sm/6 font-semibold text-white hover:text-gray-100">
                                Learn more
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                    <div class="relative flex items-center justify-center mx-auto sm:px-5 lg:px-8">
                        <img src="{{ asset('logo.jpg') }}" alt="Logo" class="rounded-4xl md:w-80 my-20 sm:w-30" />
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div>
        <section
            class="relative isolate overflow-hidden bg-gray-900 px-6 py-24 sm:py-32 lg:px-8 rounded-2xl my-10 mx-auto max-w-5xl">
            <div
                class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,var(--color-indigo-500),transparent)] opacity-10">
            </div>
            <div
                class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-gray-900 shadow-xl ring-1 shadow-indigo-500/5 ring-white/5 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center">
            </div>
            <div class="">
                <figure class="mt-10">
                    <blockquote class="text-center text-xl/8 font-semibold text-white sm:text-xl">
                        <p>“The only impossible journey is the one you never begin.”</p>
                    </blockquote>

                </figure>
            </div>
        </section>

        <div class="mt-25 mb-20 mx-auto max-w-7xl">
            <x-feature></x-feature>
        </div>

    </div>
</x-layout>

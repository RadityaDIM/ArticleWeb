<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
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

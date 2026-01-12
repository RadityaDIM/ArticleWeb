<x-layout full-width>
    <x-slot:title>
        {{ $title }}</x-slot:title>

    <section class="bg-white dark:bg-gray-900 min-h-full">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16 min-h-screen">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update profile</h2>
            <form action="{{ route('users.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="col-span-full my-6 p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700"
                        x-data="{
                            // 1. Ambil URL gambar dari database dengan aman
                            imagePreview: @js(Auth::user()->image ? asset('storage/' . Auth::user()->image) : null),
                        
                            // 2. Fungsi update preview saat file dipilih
                            updatePreview(event) {
                                const file = event.target.files[0];
                                if (file) {
                                    this.imagePreview = URL.createObjectURL(file);
                                }
                            }
                        }">

                        <label class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">
                            Featured Image
                        </label>

                        <div class="flex flex-col items-center gap-6 sm:flex-row">
                            <div class="shrink-0">
                                <template x-if="imagePreview">
                                    <img :src="imagePreview"
                                        class="object-cover w-32 h-32 rounded-lg border-2 border-gray-300 dark:border-gray-600"
                                        alt="Preview" />
                                </template>

                                <template x-if="!imagePreview">
                                    <div
                                        class="flex items-center justify-center w-32 h-32 rounded-lg bg-gray-100 border-2 border-dashed border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                                        <svg class="w-8 h-8 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                    </div>
                                </template>
                            </div>

                            <div class="w-full">
                                <input type="file" name="image" id="image" accept="image/*"
                                    @change="updatePreview($event)"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer bg-gray-50 rounded-lg border border-gray-300 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600">
                                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (Max.
                                    2MB).</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ Auth::user()->name }}" placeholder="{{ Auth::user()->name }}" required="">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ Auth::user()->username }}" placeholder="Username" required="">
                        @error('username')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ Auth::user()->email }}" placeholder="Your Email" required="">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="Password" name="Password" id="Password" disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ Auth::user()->password }}" placeholder="Your Password" required="">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Update
                    </button>
                    <a href="/change-password"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                        Change Password
                    </a>

                </div>
            </form>
        </div>
    </section>

</x-layout>

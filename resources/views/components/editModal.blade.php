 @props(['categories', 'post'])
 <div id="editModal"
     class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
     role="dialog" tabindex="-1" aria-labelledby="editModal-label">
     <div
         class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
         <div
             class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
             <div>
                 <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')

                     <div class="col-span-full my-6 p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700"
                         x-data="{ imagePreview: '{{ isset($post) && $post->image ? asset('storage/' . $post->image) : '' }}' }">

                         <label class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">
                             Featured Image
                         </label>

                         <div class="flex flex-col items-center gap-6 sm:flex-row">

                             <div class="shrink-0">
                                 <template x-if="imagePreview">
                                     <img :src="imagePreview"
                                         class="object-cover w-32 h-32 rounded-lg border-2 border-gray-300 dark:border-gray-600"
                                         alt="Image preview" />
                                 </template>

                                 <template x-if="!imagePreview">
                                     <div
                                         class="flex items-center justify-center w-32 h-32 rounded-lg bg-gray-100 border-2 border-dashed border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                                         <svg class="w-8 h-8 text-gray-400" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                 stroke-width="2"
                                                 d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                         </svg>
                                     </div>
                                 </template>
                             </div>

                             <div class="w-full">
                                 <input type="file" name="image" id="image" accept="image/*"
                                     @change="imagePreview = URL.createObjectURL($event.target.files[0])"
                                     class="block w-full text-sm text-gray-500
                          file:mr-4 file:py-2.5 file:px-6
                          file:rounded-full file:border-0
                          file:text-sm file:font-semibold
                          file:bg-blue-600 file:text-white
                          hover:file:bg-blue-700
                          cursor-pointer bg-gray-50 rounded-lg border border-gray-300
                          dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600">

                                 <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                     SVG, PNG, JPG or GIF (Max. 2MB).
                                 </p>
                             </div>

                         </div>
                     </div>

                     <div class="grid gap-4 mb-4 sm:grid-cols-3">
                         <div class="col-span-2">
                             <label for="title"
                                 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                             <input type="text" name="title" id="title"
                                 value="{{ old('title', $post->title) }}"
                                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                 placeholder="" required="">
                         </div>
                         <div>
                             <label for="category"
                                 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                             <select id="category" name="category_id" required
                                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                                 {{-- <option value="" selected disabled>{{ $post->category->name }}
                                 </option> --}}
                                 <option value="{{ $post->category->id }}" selected>
                                     {{ $post->category->name }}
                                 </option>
                                 @foreach ($categories as $cat)
                                     @if ($cat->id !== $post->category->id)
                                         <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                     @endif
                                 @endforeach
                             </select>
                         </div>
                         <div class="sm:col-span-3">
                             <label for="description"
                                 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                             <textarea id="body" rows="4" name="body"
                                 class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                 placeholder="">{{ old('body', $post->body) }}</textarea>
                         </div>
                     </div>
                     <button type="submit"
                         class="text-white w-full bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                         Update post
                     </button>
                 </form>
             </div>
         </div>
     </div>
 </div>

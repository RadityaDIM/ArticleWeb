 @props(['categories', 'post'])
 <div id="editModal"
     class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
     role="dialog" tabindex="-1" aria-labelledby="editModal-label">
     <div
         class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
         <div
             class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
             <div>
                 <form action="{{ route('posts.update', $post->slug) }}" method="POST">
                     @csrf
                     @method('PUT')
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

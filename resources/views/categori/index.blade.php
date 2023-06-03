<x-app-layout>
    <section class="category">
        <h2 class="text-5xl font-bold text-slate-900 text-center">Categories</h2>


        <form method="post" action="{{ route('categori.store') }}" class="flex flex-col items-center mt-10 w-10/12 m-auto"
            enctype="multipart/form-data">
            @csrf

            <div class="flex items-center justify-center w-full mb-6">
                <label for="dropzone-file"
                    class="flex overflow-hidden flex-col relative items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 @error('image') border-red-600 @enderror">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6 absolute -z-0">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                            </path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload</span> PNG, JPG* </p>
                    </div>
                    <img id="output" class="w-full object-cover m-auto z-10" />
                    <input id="dropzone-file" type="file" class="hidden" accept="image/*" onchange="loadFile(event)"
                        name="image" />
                    @error('image')
                        <div class="text-xs text-red-600 font-medium pb-3">{{ $message }}</div>
                    @enderror
                </label>
            </div>
            <div class="flex w-full">
                <label for="simple-search" class="sr-only">New Category</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="bi bi-node-plus text-slate-500"></i>
                    </div>
                    <input type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="New Category" name="name" value="{{ old('name') }}" required>
                </div>
                <button type="submit"
                    class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="bi bi-plus-lg"></i>
                    <span class="sr-only">add</span>
                </button>
            </div>
        </form>

        @if (session()->has('success'))
            <div id="alert-3"
                class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 mt-10 border-green-500 border"
                role="alert">
                <i class="bi bi-check-circle"></i>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-semibold">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif


        <div class="relative overflow-x-auto mt-14 rounded-xl">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Categories
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories->skip(1) as $category)
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $category->name }}
                            </th>
                            <td class="px-6 py-4">
                                <a href="/categori/{{ $category->slug }}"
                                    class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                    Product</a> |

                                <form action="/categori/{{ $category->slug }}" method="post" class="inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="my-10">
            {{ $categories->links() }}
        </div>
    </section>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
</x-app-layout>

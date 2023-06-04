<x-app-layout>
    <h3 class="text-5xl font-bold text-slate-900 text-center">Create Post Product</h3>


    <form method="POST" action="/items/{{ $item->slug }}" class="mt-10 lg:w-10/12 m-auto" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="flex items-center justify-center w-full mb-6">
            <label for="dropzone-file"
                class="flex overflow-hidden flex-col relative items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 @error('image') border-red-600 @enderror">
                <div class="flex flex-col items-center justify-center pt-5 pb-6 absolute -z-0">
                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                        </path>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                            upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG* </p>
                </div>
                <img id="output" src="{{ old('image', '/storage/' . $item->image) }}"
                    class="w-full object-cover m-auto z-10" />
                <input id="dropzone-file" type="file" class="hidden" accept="image/*" onchange="loadFile(event)"
                    name="image" value="{{ old('image', $item->image) }}" />
                @error('image')
                    <div class="text-xs text-red-600 font-medium pb-3">{{ $message }}</div>
                @enderror
            </label>
        </div>

        <div class="mb-6">
            <label for="item" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                Item*</label>
            <input type="text" id="item"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('name') border-red-600 ring-red-600 @enderror"
                placeholder="Swimsuit" name="name" value="{{ old('name', $item->name) }}" required>
            @error('name')
                <div class="text-xs text-red-600 font-medium pb-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                Category*</label>
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('category') border-red-600 ring-red-600 @enderror"
                name="category">
                <option value="" selected disabled>Select Category</option>
                @foreach ($categories->skip(1) as $category)
                    @if (old('category', $item->categori_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('category')
                <div class="text-xs text-red-600 font-medium pb-3">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price*</label>
            <input type="number" id="price"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('price') border-red-600 ring-red-600 @enderror"
                placeholder="100000" name="price" value="{{ old('price', $item->price) }}" required>
            @error('price')
                <div class="text-xs text-red-600 font-medium pb-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
            <input type="number" id="discount"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('discount') border-red-600 ring-red-600 @enderror"
                placeholder="25" name="discount" value="{{ old('discount', $item->discount) }}">
            @error('discount')
                <div class="text-xs text-red-600 font-medium pb-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Product In
                Ecommerce</label>
            <input type="text" id="link"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('link') border-red-600 ring-red-600 @enderror"
                placeholder="https://www.tokopedia.com/******/***" required name="link"
                value="{{ old('link', $item->link) }}">
            @error('link')
                <div class="text-xs text-red-600 font-medium pb-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-8">
            <label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description*</label>
            <textarea name="content" class="border-2 rounded-2xl @error('content') border-red-600 ring-red-600 @enderror">{{ old('content', $item->description) }}</textarea>
            <span class="text-red-500"></span>
            @error('content')
                <div class="text-xs text-red-600 font-medium pb-3">{{ $message }}</div>
            @enderror
        </div>



        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+
            Upload
            Item</button>
    </form>


    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('content');
    </script>
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

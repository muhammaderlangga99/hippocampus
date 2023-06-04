<x-app-layout>
    <section class="post">
        <h2 class="text-5xl font-bold text-slate-900 text-center">All Items</h2>


        <form class="flex items-center w-10/12 m-auto mt-8" method="GET" action="/items">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search" name="items" value="{{ old('items') }}" required>
            </div>
            <button type="submit"
                class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="sr-only">Search</span>
            </button>
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

        <div class="flex justify-between">
            <a href="{{ route('items.create') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-10">+
                Add
                Product</a>
            <a href="{{ route('categori.index') }}"
                class="text-blue-600 bg-blue-50 hover:bg-blue-100 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-10 border border-blue-400">
                Add Category</a>

        </div>

        <div class="relative overflow-x-auto shadow-md rounded-2xl mt-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            discount
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 border-slate-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->categori->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($item->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->discount > 0)
                                    {{ $item->discount }}%
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="/items/{{ $item->slug }}"
                                    class="font-medium text-green-600 dark:text-green-500 hover:underline">Detail</a> |
                                <a href="/items/{{ $item->slug }}/edit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> |
                                <form action="/items/{{ $item->slug }}" method="post" class="inline">
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
            {{ $items->links() }}
        </div>
    </section>
</x-app-layout>

<x-app-layout>
    <section class="category">
        <h2 class="text-5xl font-bold text-slate-900 text-center">Category {{ $title->name }}</h2>
    </section>

    <form class="flex items-center w-10/12 m-auto mt-8" method="GET" action="/categori/{{ $title->slug }}">
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
                placeholder="Search" name="category" value="{{ old('category') }}" required>
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

    <div class="relative overflow-x-auto shadow-md rounded-2xl mt-10">
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
</x-app-layout>

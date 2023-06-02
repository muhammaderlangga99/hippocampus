<x-app-layout>
    <section class="category">
        <h2 class="text-5xl font-bold text-slate-900 text-center">Category {{ $title }}</h2>
    </section>

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
                            {{ $item->price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->discount }}%
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

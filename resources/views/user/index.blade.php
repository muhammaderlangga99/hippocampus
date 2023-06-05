<x-app-layout>
    <section class="post">
        <h2 class="text-5xl font-bold text-slate-900 text-center">All users</h2>


        <div class="flex justify-between">
            <a href="/register"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-10">+
                Add
                User</a>
        </div>

        @if (session()->has('success'))
            <div id="alert-3"
                class="flex p-4 mb-4 max-w-5xl m-auto text-green-800 rounded-lg bg-green-50 mt-10 border-green-500 border"
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

        <div class="relative overflow-x-auto shadow-md rounded-2xl mt-4 max-w-5xl m-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3 text-right">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users->skip(1) as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 border-slate-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </th>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-3">
                                @if (Auth()->user()->name == 'admin' || Auth()->user()->name == 'hiddenadmin')
                                    @if ($user->name != 'admin')
                                        <form action="/user/{{ $user->name }}" method="post" class="inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="font-medium text-slate-400 text-lg hover:text-red-500 hover:underline"><i
                                                    class="bi bi-trash2-fill"></i></button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>

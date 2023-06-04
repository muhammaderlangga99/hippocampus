@extends('main')

@section('content')

    <body class="font-montserrat">
        <section class="header relative">
            <img src="{{ asset('img/union.png') }}" class="absolute -z-30" alt="">
            <div class="mt-20 m-auto">
                <div class="flex m-auto flex-col justify-center items-center md:items-start">
                    <h1 class="text-5xl font-bold text-slate-900 text-center md:text-left">Contact <span
                            class="text-blue-600">Us</span></h1>
                    <p class="text-base text-slate-600 mt-6 text-center md:text-left">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Quisquam, voluptatibus.</p>
                </div>

                @if (session()->has('success'))
                    <div id="alert-3"
                        class="flex p-4 mb-4 w-10/12 md:w-7/12 text-green-800 rounded-lg bg-green-50 mt-10 border-green-500 border m-auto"
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

                <form class="w-10/12 mt-8 md:w-7/12 m-auto z-50" action="{{ route('contact.index') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            Name</label>
                        <input type="text" id="name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('name') border-red-500 @enderror"
                            placeholder="jhon" required name="name">
                        @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="whatsapp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            whatsapp</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                +62
                            </span>
                            <input type="number" id="website-admin"
                                class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('whatsapp') border-red-500 @enderror"
                                placeholder="85812345678" name="whatsapp" required>
                            @error('whatsapp')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        message</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('message') border-red-500 @enderror"
                        placeholder="Leave a comment..." name="message"></textarea>
                    @error('message')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror


                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-7">Send
                        <i class="bi bi-send-fill text-slate-400"></i></button>
                </form>


            </div>

        </section>
    </body>
@endsection

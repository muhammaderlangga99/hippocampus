<x-app-layout>
    <section class="post">
        <h2 class="text-5xl font-bold text-slate-800 text-center font-montserrat">Inbox</h2>

        @if (session()->has('success'))
            <div id="alert-3" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 mt-10 border-green-500 border"
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

        <div class="max-w-6xl m-auto mt-20">
            @foreach ($contacts as $contact)
                <div class="message flex relative space-x-5 p-5 bg-slate-100 border border-slate-300 rounded-2xl mb-7">
                    <div class="img">
                        <img src="{{ asset('img/avatar.svg') }}" class="md:w-8/12 m-auto" alt="">
                    </div>
                    <div class="relative">
                        <h3 class="font-medium text-blue-600">{{ $contact->name }}</h3>
                        <p class="text-xs mb-2">{{ $contact->created_at->diffForHumans() }}</p>
                        <p class="text-xs text-slate-400">Whatsapp: {{ $contact->whatsapp }}</p>
                        <p class="mt-6 text-sm">{{ $contact->message }}</p>
                    </div>

                    <form action="contacts/{{ $contact->id }}" method="post" class="absolute right-5">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-slate-600 hover:text-slate-900"><i
                                class="bi bi-trash3-fill"></i></button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{ $contacts->links() }}
        </div>
    </section>
</x-app-layout>

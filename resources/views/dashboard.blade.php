<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <section class="dashboard">
        <h2 class="text-5xl font-bold text-slate-900 text-center">Welcome back {{ Auth::user()->name }}</h2>

    </section>
</x-app-layout>

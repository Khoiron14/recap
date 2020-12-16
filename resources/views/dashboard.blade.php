<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class=" max-w-7xl mx-5 sm:px-6 lg:px-8">
            <div class="text-xl mb-2">{{ Carbon\Carbon::now()->format('l, d F Y') }}</div>
            @role('admin')
            @if ($todayRecapNotAvailable)
            <livewire:create-recap />
            @endif
            @endrole

            <livewire:list-recap />
        </div>
    </div>
</x-app-layout>
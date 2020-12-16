<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12  px-6">
        <div class="max-w-7xl mx-5 sm:px-6 lg:px-8">
            <livewire:show-recap :recap="$recap" />

            <livewire:create-comment :recap="$recap"/>

            <livewire:list-comment :recap="$recap" />
        </div>
    </div>
</x-app-layout>
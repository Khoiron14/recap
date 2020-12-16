<div>
    <input type="month" wire:model="monthFilter"
        class="mb-2 w-44 focus:ring-teal-500 focus:border-teal-500 px-2 py-1 text-sm border-teal-300 rounded-md inline-block shadow-xs mx-1"
        id="filter">
    <button wire:click="filterReset"
        class="bg-gray-500 hover:bg-gray-600 text-white text-sm rounded-md px-2 py-1">Reset</button>

    @forelse ($recaps as $recap)
    <div class="bg-white shadow-xl rounded-lg p-4 mb-2 border-l-4 border-teal-500">
        <a wire:click="showRecap({{ $recap->id }})"
            class="text-xl font-bold hover:text-gray-500 bg-primary cursor-pointer">{{ $recap->getDate() }}</a>
    </div>
    @empty
    <div class="flex m-4">No data available</div>
    @endforelse

    {{ $recaps->links() }}
</div>
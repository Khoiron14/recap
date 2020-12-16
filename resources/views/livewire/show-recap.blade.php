<div class="mb-4">
    <div>
        <div class="inline-block mb-4 text-xl">
            {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $recap->created_at)->format('l, d F Y') }}
        </div>

        @role('admin')
        <div class="md:float-right mb-2">
            @if (!$showUpdateRecapForm)
            <button wire:click="showUpdateRecapForm"
            class="bg-teal-500 hover:bg-teal-600 text-white text-sm rounded-md px-3 py-1">Edit</button>
            @endif
            <button wire:click="deleteRecap"
                onClick="return confirm('Are you sure you want to delete this recap?') || event.stopImmediatePropagation()"
                class="bg-red-500 hover:bg-red-600 text-white text-sm rounded-md px-3 py-1 ml-1">Delete</button>
        </div>
        @endrole
    </div>

    @if (session()->has('message'))
    <div class="bg-teal-100 rounded-md text-teal-900 px-4 py-3 shadow-md mb-3" role="alert">
        <div class="flex">
            <div>
                <p class="text-sm">{{ session('message') }}</p>
            </div>
        </div>
    </div>
    @endif

    <div class="bg-white overflow-hidden shadow-xl rounded-lg p-4">
        @if ($this->showUpdateRecapForm)
        <div class="form-control" wire:ignone>
            <textarea id="ckeditor" wire:model.debounce.9999999ms="body" x-data x-init="
            CKEDITOR.instances['ckeditor'].on('change', function(e){
                $dispatch('input', e.editor.getData())
            });"
                class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline py-2 px-3"
                rows="3">
            </textarea>
        </div>

        @error('body')
        <span class="text-red-500">{{ $message }}</span>
        @enderror

        <div class="flex justify-end mt-2">
            <button wire:click="closeUpdateRecapForm"
            onClick="return confirm('Are you sure to cancel editing?') || event.stopImmediatePropagation()"
                class="bg-gray-500 hover:bg-gray-600 text-white rounded-md px-4 py-2 m-2">Cancel</button>
            <button wire:click="updateRecap"
                class="bg-blue-500 hover:bg-blue-600 text-white rounded-md px-4 py-2 m-2">Save</button>
        </div>

        <script>
            CKEDITOR.replace('ckeditor');
        </script>
        @else
        <div class="px-10">{!! $recap->body !!}</div>
        @endif
    </div>
</div>
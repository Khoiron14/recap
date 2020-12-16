<div>
    <button class="mb-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md px-4 py-2 shadow" id="create-btn">
        Create Recap
    </button>

    <div class="absolute inset-0 hidden justify-center items-center bg-gray-500 bg-opacity-50 z-50" id="overlay">
        <div class="p-4 w-screen md:mx-20 bg-white shadow-md rounded-md">
            <h2 class="font-semibold text-xl text-gray-800 leading-tigh mb-2">Create Recap</h2>
            <div class="form-control" wire:ignone>
                @error('body')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <textarea id="ckeditor" wire:model.debounce.9999999ms="body" x-data x-init="
                    CKEDITOR.instances['ckeditor'].on('change', function(e){
                        $dispatch('input', e.editor.getData())
                    });"
                    class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline py-2 px-3"
                    rows="3">
                </textarea>

                <div class="float-right">
                    <button 
                        class="bg-gray-500 hover:bg-gray-600 text-white rounded-md px-4 py-2 my-2"
                        id="close-modal">Cancel</button>
                    <button wire:click="createRecap"
                        class="bg-blue-500 hover:bg-blue-600 text-white rounded-md px-4 py-2 my-2">Create</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('ckeditor');

        window.addEventListener('DOMContentLoaded', () => {
            const crtBtn = document.querySelector('#create-btn')
            const overlay = document.querySelector('#overlay')
            const clsBtn = document.querySelector('#close-modal')

            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }

            crtBtn.addEventListener('click', toggleModal)
            clsBtn.addEventListener('click', toggleModal)
        })
    </script>
</div>
<div class="my-3">
    <h2 class="font-semibold text-xl text-gray-800 leading-tigh mb-2">Write your comment</h2>

    <button class="bg-blue-500 hover:bg-blue-600 text-white rounded-md px-4 py-2 shadow" id="create-btn">
        Write Comment
    </button>

    <div class="absolute inset-0 hidden justify-center items-center bg-gray-500 bg-opacity-50 z-1" id="overlay">
        <div class="p-4 w-screen md:mx-20 bg-white shadow-md rounded-md">
        <h2 class="font-semibold text-xl text-gray-800 leading-tigh mb-2">Write Comment</h2>
        <div class="form-control" wire:ignone>
                @error('body')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <textarea id="ckeditor-comment" wire:model.debounce.9999999ms="text" x-data x-init="
                    CKEDITOR.instances['ckeditor-comment'].on('change', function(e){
                        $dispatch('input', e.editor.getData())
                    });"
                    class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline py-2 px-3"
                    rows="3">
                </textarea>

                <div class="float-right">
                    <button class="bg-gray-500 hover:bg-gray-600 text-white rounded-md px-4 py-2 my-2"
                        id="close-modal">Cancel</button>
                    <button wire:click="createComment({{ $this->recapId }})"
                        class="bg-blue-500 hover:bg-blue-600 text-white rounded-md px-4 py-2 m-2" id="send-btn">Send</button>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
    <div class="bg-teal-100 rounded-md text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div>
                <p class="text-sm">{{ session('message') }}</p>
            </div>
        </div>
    </div>
    @endif

    <script>
        CKEDITOR.replace('ckeditor-comment');

        window.addEventListener('DOMContentLoaded', () => {
            const crtBtn = document.querySelector('#create-btn')
            const sndBtn = document.querySelector('#send-btn')
            const clsBtn = document.querySelector('#close-modal')
            const overlay = document.querySelector('#overlay')

            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }

            crtBtn.addEventListener('click', toggleModal)
            crtBtn.addEventListener('click', () => {
                overlay.scrollIntoView()
                document.body.style.overflow = "hidden";
                document.body.style.height = "100%";
            })
            clsBtn.addEventListener('click', toggleModal)
            clsBtn.addEventListener('click', () => { 
                crtBtn.scrollIntoView()
                document.body.style.overflow = "auto";
                document.body.style.height = "auto";
            })
            sendBtn.addEventListener('click', () => { 
                crtBtn.scrollIntoView()
                document.body.style.overflow = "auto";
                document.body.style.height = "auto";
            })
        })
    </script>
</div>
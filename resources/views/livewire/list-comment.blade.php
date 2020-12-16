<div>
    @forelse ($comments as $comment)
    <div class="bg-white shadow-xl rounded-lg p-4 mb-2">
        <div class="inline-block">
            <span class="font-semibold">{{ $comment->user->name }}</span>
            <span class="italic text-sm">{{ $comment->created_at->diffForHumans() }}</span>
        </div>

        @if (auth()->user()->isCommentOwner($comment->id))
        <div class="float-right">
            @if ($updateStateId != $comment->id)
            <button wire:click="showUpdateCommentForm({{ $comment->id }})"
                class="bg-teal-500 hover:bg-teal-600 text-white text-sm rounded-md px-3 py-1">Edit</button>
            @endif
            <button wire:click="deleteComment({{ $comment->id }})"
                onClick="return confirm('Are you sure you want to delete this comment?') || event.stopImmediatePropagation()"
                class="bg-red-500 hover:bg-red-600 text-white text-sm rounded-md px-3 py-1 ml-1">Delete</button>
        </div>
        @endif

        <div>
            @if ($updateStateId != $comment->id)
            <div class="px-5">
                {!! $comment->text !!}
            </div>
            @else
            <div class="form-control mt-4" wire:ignone>
                <textarea id="ckeditor-comment-{{ $comment->id }}" wire:model.debounce.9999999ms="text" x-data x-init="
                CKEDITOR.instances['ckeditor-comment-{{ $comment->id }}'].on('change', function(e){
                    $dispatch('input', e.editor.getData())
                });"
                    class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline py-2 px-3"
                    rows="3">
                </textarea>
            </div>

            @error('text')
            <span class="text-red-500">{{ $message }}</span>
            @enderror

            <div class="flex justify-end">
                <button wire:click="updateStateId(0)"
                    onClick="return confirm('Are you sure to cancel editing?') || event.stopImmediatePropagation()"
                    class="bg-gray-500 hover:bg-gray-600 text-white rounded-md px-4 py-2 m-2">Cancel</button>
                <button wire:click="updateComment({{ $comment->id }})"
                    class="bg-blue-500 hover:bg-blue-600 text-white rounded-md px-4 py-2 m-2">Save</button>
            </div>

            <script>
                CKEDITOR.replace('ckeditor-comment-{{ $comment->id }}');
            </script>
            @endif
        </div>
    </div>
    @empty
    <div class="flex justify-center m-4">No comments available</div>
    @endforelse

    {{ $comments->links() }}
</div>
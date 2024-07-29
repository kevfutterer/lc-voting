<div 
    x-cloak
    x-data="{isOpen: false}"
    x-show = "isOpen"
    {{-- @custom-show-edit-modal.window = "isOpen = true" --}}
    @keydown.escape.window = "isOpen = false"
    x-init="
        $wire.on('commentWasUpdated', () => {isOpen = false})
        {{-- Livewire.on('commentWasUpdated', () => {
            isOpen = false
        }) --}}
        Livewire.on('editCommentWasSet', () => {
            isOpen = true
        })
        "
    class="relative z-10" 
    aria-labelledby="modal-title" role="dialog" 
    aria-modal="true">

    <div 
        x-show.transition.opacity = "isOpen"
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
        aria-hidden="true">
    </div>

    <div 
        x-show.transition.origin.bottom.duration.400ms = "isOpen"
        class="modal fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex flex-col min-h-full items-center justify-end p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-tl-xl rounded-tr-xl bg-white text-left shadow-xl transition-all  sm:w-full sm:max-w-lg">
          <div class="absolute top-0 right-0 pt-4 pr-4">
            <button 
                @click = "isOpen = false"
                class="text-gray-400 hover:text-gray-500 ">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>                  
            </button>
          </div>
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <h3 class="text-center text-lg font-medium text-gray-900">Edit Comment</h3>
            <form wire:submit.prevent="updateComment" action="" method="POST" class="space-y-4 px-4 py-6">
                <div>
                    <textarea 
                        wire:model.defer="body"
                        name="comment"
                        id="comment" cols="3" rows="4" 
                        class="w-full bg-gray-100 rounded-xl placeholder-gray-900 text-sm px-4 py-2 border-none" 
                        placeholder="Descripe your Comment"
                        required
                        >
                    </textarea>
                    @error('body')
                        <p class="text-red text-xs mt-1">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="flex items-center justify-between space-x-3">
                    <button type="button"
                        class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-full border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-2 py-2" >
                        <svg class="w-4 -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                        </svg>                                  
                        <span class="ml-1">Attach</span>
                    </button>
                    <button type="submit"
                        class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue font-semibold rounded-full border text-white border-blue hover:bg-blue-hover transition duration-150 ease-in px-2 py-2" >
                        <span class="ml-1">Update</span>
                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  

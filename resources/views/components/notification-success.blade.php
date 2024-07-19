<div
        x-data="{isOpen: false}"
        >
        <button 
          @click="
            isOpen = true
            setTimeout(() => {
              isOpen = false
            }, 5000)
            "
          >
          Toggle
        </button>
        <div 
            x-cloak
            x-show.transiton.opacity.duration.300ms = "isOpen"
            x-show = "isOpen"
            @keydown.escape.window = "isOpen = false"
            x-init="$wire.on('ideaWasUpdated', () => {isOpen = false})"
            class="z-20 flex justify-between max-w-sxs sm:max-w-sm w-full fixed bottom-0 right-0 bg-white rounded-xl shadow-lg border px-6 py-5 mx-2 sm:mx-6 my-8">
            <div class="flex items-center ">
                <svg class="text-green h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="ml-2 font-semibold text-gray-500 text-sm sm:text-base">Idea was updated succesfully!</span>
            </div>
            <button @click="isOpen = false" class="text-gray-400 hover:text-gray-500">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>              
            </button>
        </div>
    </div>
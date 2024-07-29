<div 
    x-data="{ isOpen: false }" 
    class="relative"
    x-init="$wire.on('commentWasAdded', () => {isOpen = false})"
    >
    <button type="button"
        @click="isOpen = !isOpen"
        class="flex items-center text-sm justify-center h-11 w-32 bg-blue font-semibold rounded-full border text-white border-blue hover:bg-blue-hover transition duration-150 ease-in px-2 py-2" >
        <span class="ml-1">Reply</span>
    </button>
    <div 
        x-cloak
        x-show.transition.origin.top.left = "isOpen"
        @click.away = "isOpen = false"
        @keydown.excape.window="isOpen = false"
        class=" absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
        @auth
            <form wire:submit.prevent="addComment" action="#" class="space-y-4 px-4 py-6">
                <div>
                    <textarea wire:model="comment" name="post_comment" id="post_comment" cols="30" rows="4" 
                    class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" 
                    placeholder="Go ahead, dont't be shy. Share your thoughts... " required></textarea>
                    @error('comment')
                        <p class="text-red text-xs mt-1">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="flex flex-col md:flex-row items-center md:space-x-3">
                    <button type="submit"
                        class="flex items-center text-sm justify-center h-11 w-full md:w-1/2 bg-blue font-semibold rounded-full border text-white border-blue hover:bg-blue-hover transition duration-150 ease-in px-2 py-2" >
                        <span class="ml-1">Post comment</span>
                    </button>
                    <button type="button"
                        class="flex items-center justify-center w-full md:w-32 h-11 text-xs bg-gray-200 font-semibold rounded-full border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-2 py-2 mt-2 md:mt-0" >
                        <svg class="w-4 -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                        </svg>                                  
                        <span class="ml-1">Attach</span>
                    </button>
                </div>
            </form>
        @else 
            <div class="px-4 py-6">
                <p class="font-normal">Please login or create an account to post a comment</p>
                <div class="flex items-center space-x-3 mt-8">
                    <a href="{{ route('login')}}" class="w-1/2 h-11 text-sm text-center bg-blue text-white font-seimbold rounded-full hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">Login</a>
                    <a href="{{ route('register')}}" class="w-1/2 h-11 text-sm text-center bg-gray-200 font-seimbold rounded-full border border-gray-200 hover:bg-gray-400 transition duration-150 ease-in px-6 py-3">Register</a>
                </div>
            </div>
        @endauth
    </div>
</div>
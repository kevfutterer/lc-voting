<form wire:submit.prevent="createIdea" action="" method="POST" class="space-y-4 px-4 py-6">
    <div>
        <input 
            wire:model.defer="title" 
            type="text" 
            class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2" 
            placeholder="Your idea"
            required>
        @error('title')
            <p class="text-red text-xs mt-1">
                {{$message}}
            </p>
        @enderror
    </div>
    <div>
        <select 
            wire:model.defer="category" 
            name="category_add" 
            id="category_add" 
            class="text-sm bg-gray-100 w-full rounded-xl px-4 py-2 border-none">
            @foreach ($categories as $category)
                <option value="{{ $category->id}}">{{ $category->name}}</option>
            @endforeach
        </select>
        @error('category')
            <p class="text-red text-xs mt-1">
                {{$message}}
            </p>
        @enderror
    </div>
    <div>
        <textarea 
            wire:model.defer="description"  
            name="idea" 
            id="idea" cols="3" rows="4" 
            class="w-full bg-gray-100 rounded-xl placeholder-gray-900 text-sm px-4 py-2 border-none" placeholder="Descripe your idea"
            required>
        </textarea>
        @error('description')
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
            <span class="ml-1">Submit</span>
        </button>
    </div>

    <div>
        @if (session('success_message'))
            <div 
                x-data = "{isVisible: true}"
                x-init = "
                    setTimeout(() => {
                        isVisible = false
                    }, 5000)
                "
                x-show.transition.duration.100ms = "isVisible"
                class="text-green mt-4">
                {{session('success_message')}}
            </div>
        @endif
    </div>
</form>

<div>
    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/3">
            <select name="category" id="category" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="category one">Category One</option>
                <option value="category two">Category two</option>
                <option value="category one">Category One</option>
                <option value="category one">Category One</option>
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select name="filters" id="filters" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="filters one">filters One</option>
                <option value="filters two">filters two</option>
                <option value="filters one">filters One</option>
                <option value="filters one">filters One</option>
            </select>
        </div>
        <div class="w-full md:w-2/3 relative">
            <input type="search" placeholder="Find an idea" class="w-full rounded-xl bg-white px-4 border-none py-2 pl-8 placeholder-gray-900">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>              
            </div>
        </div>
    </div>

    <div class="ideas-container space-y-6 my-6">
        @foreach ($ideas as $idea)
            <livewire:idea-index :key="$idea->id" :idea="$idea" :votesCount="$idea->votes_count" />
        @endforeach
    </div>
    <div class="my-8">
        {{$ideas->links()}}
    </div></div>
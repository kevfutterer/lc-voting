<div class="idea-and-buttons-container">
        
    <div class="mt-4 idea-container bg-white rounded-xl flex">
        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-none mx-2">
                <a href="" >
                    <img src="{{ $idea->user->getAvatar()}}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="mx-2 md:mx-4 w-full">
                <h4 class="text-xl font-semibold">
                    {{$idea->title}}
                </h4>
                <div class=" text-gray-600 mt-3 line-clamp-3">
                    {{ $idea->description}}
                </div>
                <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                        <div class="hidden md:block font-bold text-gray-900">{{$idea->user->name}}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{$idea->created_at->diffForHumans()}} </div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name}} </div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 comments</div>
                    </div>
                    <div 
                        class="flex items-center space-x-2 mt-4 md:mt-0"
                        x-data="{ isOpen: false }"
                        >
                        <div class=" {{$idea->status->classes}} text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4"> {{$idea->status->name}}</div>
                        <div class="relative">
                            <button 
                                @click="isOpen = !isOpen"
                                class="relative border bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="#000000" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32.055 32.055" xml:space="preserve" stroke="#000000" stroke-width="0.00032055"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M3.968,12.061C1.775,12.061,0,13.835,0,16.027c0,2.192,1.773,3.967,3.968,3.967c2.189,0,3.966-1.772,3.966-3.967 C7.934,13.835,6.157,12.061,3.968,12.061z M16.233,12.061c-2.188,0-3.968,1.773-3.968,3.965c0,2.192,1.778,3.967,3.968,3.967 s3.97-1.772,3.97-3.967C20.201,13.835,18.423,12.061,16.233,12.061z M28.09,12.061c-2.192,0-3.969,1.774-3.969,3.967 c0,2.19,1.774,3.965,3.969,3.965c2.188,0,3.965-1.772,3.965-3.965S30.278,12.061,28.09,12.061z"></path> </g> </g></svg>
                            </button>
                            <ul 
                                x-cloak
                                x-show.transition.origin.top.left = "isOpen"
                                @click.away = "isOpen = false"
                                @keydown.excape.window="isOpen = false"
                                class=" text-left absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0 z-10">
                                <li>
                                    <a 
                                        href="" 
                                        @click.prevent = "
                                            isOpen = false
                                            $dispatch('custom-show-edit-modal')
                                            "
                                        class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                        Edit Idea
                                    </a>
                                </li>
                                <li>
                                    <a 
                                        href="" 
                                        class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                        Delete Idea
                                    </a>
                                </li>
                                <li>
                                    <a 
                                        href="" 
                                        class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">
                                        Mark as Spam
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex items-center md:hidden mt-4 md:mt-0">
                        <div class="bg-gray-100 text-center rounded-full h-10 px-4 py-2 pr-8">
                            <div class="text-sm font-bold leading-none @if($hasVoted) text-blue @endif ">{{$votesCount}} </div>
                            <div class="text-xs font-semibold leading-none text-gray-400">Votes</div>
                        </div>
                        @if ($hasVoted)
                            <button 
                            wire:click.prevent="vote"
                            class="w-20 bg-blue text-white border border-blue font-bold text-xs uppercase rounded-full hover:bg-blue-hover transition duration-150 ease-in px-4 py-3 -mx-5">
                                Voted
                            </button>
                        @else
                            <button 
                            wire:click.prevent="vote"
                            class="w-20 bg-gray-200 text-black border border-gray-200 font-bold text-xs uppercase rounded-full hover:border-gray-400 transition duration-150 ease-in px-4 py-3 -mx-5">
                                Vote
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="buttons-container flex items-center justify-between mt-6">
        <div class="flex flex-col md:flex-row items-center space-x-4 md:ml-6">
            <div x-data="{ isOpen: false }" class="relative">
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
                    <form action="" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea name="post_comment" id="post_comment" cols="30" rows="4" 
                            class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" 
                            placeholder="Go ahead, dont't be shy. Share your thoughts... "></textarea>
                        </div>
                        <div class="flex flex-col md:flex-row items-center md:space-x-3">
                            <button type="button"
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
                </div>
            </div>
            @auth
                @if (Auth::user()->id === $idea->user->id)
                   <livewire:set-status :idea="$idea" />
                @endif
            @endauth
        </div>
        <div class="hidden md:flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug @if($hasVoted) text-blue @endif">{{$votesCount}}</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            @if ($hasVoted)
                <button 
                    wire:click.prevent="vote"
                    type="button"
                    class="w-32 h-11 text-xs bg-blue uppercase font-semibold rounded-full border text-white border-blue hover:bg-blue-hover transition duration-150 ease-in px-2 py-2" >
                    <span class="mr-2">Voted</span>
                </button>
            @else
                <button 
                    wire:click.prevent="vote"
                    type="button"
                    class="w-32 h-11 text-xs bg-gray-200 uppercase font-semibold rounded-full border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-2 py-2" >
                    <span class="mr-2">Vote</span>
                </button>
            @endif
            
        </div>
    </div>
</div>
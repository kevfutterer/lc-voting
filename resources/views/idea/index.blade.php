<x-app-layout>
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
            <div 
                x-data
                @click = "
                    const target = $event.target.tagName.toLowerCase()
                    const ignores = ['button', 'svg', 'path', 'a']
                    if (! ignores.includes(target)) {
                        $event.target.closest('.idea-container').querySelector('.idea-link').click()
                    }
                "
                class="idea-container bg-white rounded-xl flex hover:shadow-card cursor-pointer transition duration-150 ease-in">
                <div class="hidden md:block border-r border-gray-100 px-5 py-8">
                    <div class="text-center">
                        <div class="font-semibold text-2xl">12</div>
                        <div class="text-gray-500"></div>
                    </div>

                    <div class="mt-8">
                        <button class="w-20 bg-gray-200 font-bold text-xs uppercase rounded-full px-4 py-3 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                            Vote
                        </button>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
                    <div class="flex-none mx-2 md:mx-0">
                        <a href="" >
                            <img src="{{ $idea->user->getAvatar()}}" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="mx-2 md:mx-4 w-full flex flex-col justify-between">
                        <h4 class="text-xl font-semibold mt-2 md:mt-0">
                            <a href="{{ route('idea.show', $idea )}}" class="idea-link hover:underline">{{$idea->title}}</a>
                        </h4>
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            {{ $idea->description}}
                        </div>
                        <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
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
                                <div class="bg-gray-200 text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                                <button 
                                    @click="isOpen = !isOpen"
                                    class="relative border bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg fill="#000000" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32.055 32.055" xml:space="preserve" stroke="#000000" stroke-width="0.00032055"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M3.968,12.061C1.775,12.061,0,13.835,0,16.027c0,2.192,1.773,3.967,3.968,3.967c2.189,0,3.966-1.772,3.966-3.967 C7.934,13.835,6.157,12.061,3.968,12.061z M16.233,12.061c-2.188,0-3.968,1.773-3.968,3.965c0,2.192,1.778,3.967,3.968,3.967 s3.97-1.772,3.97-3.967C20.201,13.835,18.423,12.061,16.233,12.061z M28.09,12.061c-2.192,0-3.969,1.774-3.969,3.967 c0,2.19,1.774,3.965,3.969,3.965c2.188,0,3.965-1.772,3.965-3.965S30.278,12.061,28.09,12.061z"></path> </g> </g></svg>
                                    <ul 
                                        x-cloak
                                        x-show.transition.origin.top.left = "isOpen"
                                        @click.away = "isOpen = false"
                                        @keydown.excape.window="isOpen = false"
                                        class="text-left absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0">
                                        <li>
                                            <a href="" class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Mark as spam</a>
                                        </li>
                                        <li>
                                            <a href="" class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Delete Post</a>
                                        </li>
                                    </ul>
                                </button>
                            </div>

                            <div class="flex items-center md:hidden mt-4 md:mt-0">
                                <div class="bg-gray-100 text-center rounded-full h-10 px-4 py-2 pr-8">
                                    <div class="text-sm font-bold leading-none">12</div>
                                    <div class="text-xs font-semibold leading-none text-gray-400">Votes</div>
                                </div>
                                <button class="w-20 bg-gray-200 text-black border border-gray-200 font-bold text-xs uppercase rounded-full hover:border-gray-400 transition duration-150 ease-in px-4 py-3 -mx-5">
                                    Vote
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-8">
        {{$ideas->links()}}
    </div>

</x-app-layout>

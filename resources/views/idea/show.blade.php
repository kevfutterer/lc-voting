<x-app-layout>
    <div>
        <a href="{{ $backUrl}}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
              </svg>              
            <span class="ml-2">All ideas</span>
        </a>
    </div>

    <livewire:idea-show :idea="$idea" :votesCount="$votesCount" />

    @can('update', $idea)
        <livewire:edit-idea :idea="$idea" />
    @endcan

    @can('delete', $idea)
        <livewire:delete-idea :idea="$idea" />
    @endcan

    <livewire:mark-idea-as-spam :idea="$idea" />

    @admin
        <livewire:mark-idea-as-not-spam :idea="$idea" />
    @endadmin

    <div class="comments-container relative space-y-6 md:ml-22 my-8 mt-1 pt-5">
        <div class="comment-container relative mt-4  bg-white rounded-xl flex ">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="" >
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=2970&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="md:mx-4 w-full">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae esse fuga eligendi eum quos necessitatibus recusandae impedit hic nostrum, nisi illum omnis, accusantium numquam, maxime nobis consectetur explicabo ipsum!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae esse fuga eligendi eum quos necessitatibus recusandae impedit hic nostrum, nisi illum omnis, accusantium numquam, maxime nobis consectetur explicabo ipsum!
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div 
                            x-data="{ isOpen: false }"
                            class="flex items-center space-x-2">
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
                                    class="z-10 text-left absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0 z-10">
                                    <li>
                                        <a href="" class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Mark as spam</a>
                                    </li>
                                    <li>
                                        <a href="" class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Delete Post</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="comment-container relative mt-4  bg-white rounded-xl flex ">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="" >
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=2970&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="md:mx-4 w-full">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae esse fuga eligendi eum quos necessitatibus recusandae impedit hic nostrum, nisi illum omnis, accusantium numquam, maxime nobis consectetur explicabo ipsum!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae esse fuga eligendi eum quos necessitatibus recusandae impedit hic nostrum, nisi illum omnis, accusantium numquam, maxime nobis consectetur explicabo ipsum!
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                            
                        </div>
                        <div 
                            x-data="{ isOpen: false }"
                            class="flex items-center space-x-2">
                            <button 
                                @click="isOpen = !isOpen"
                                class="relative border bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="#000000" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32.055 32.055" xml:space="preserve" stroke="#000000" stroke-width="0.00032055"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M3.968,12.061C1.775,12.061,0,13.835,0,16.027c0,2.192,1.773,3.967,3.968,3.967c2.189,0,3.966-1.772,3.966-3.967 C7.934,13.835,6.157,12.061,3.968,12.061z M16.233,12.061c-2.188,0-3.968,1.773-3.968,3.965c0,2.192,1.778,3.967,3.968,3.967 s3.97-1.772,3.97-3.967C20.201,13.835,18.423,12.061,16.233,12.061z M28.09,12.061c-2.192,0-3.969,1.774-3.969,3.967 c0,2.19,1.774,3.965,3.969,3.965c2.188,0,3.965-1.772,3.965-3.965S30.278,12.061,28.09,12.061z"></path> </g> </g></svg>
                                <ul 
                                    x-cloak
                                    x-show.transition.origin.top.left = "isOpen"
                                    @click.away = "isOpen = false"
                                    @keydown.excape.window="isOpen = false"
                                    class="z-10 text-left absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0 z-10">
                                    <li>
                                        <a href="" class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Mark as spam</a>
                                    </li>
                                    <li>
                                        <a href="" class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Delete Post</a>
                                    </li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="comment-container relative mt-4  bg-white rounded-xl flex ">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="" >
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=2970&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="md:mx-4 w-full">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae esse fuga eligendi eum quos necessitatibus recusandae impedit hic nostrum, nisi illum omnis, accusantium numquam, maxime nobis consectetur explicabo ipsum!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae esse fuga eligendi eum quos necessitatibus recusandae impedit hic nostrum, nisi illum omnis, accusantium numquam, maxime nobis consectetur explicabo ipsum!
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                            
                        </div>
                        <div 
                            x-data="{ isOpen: false }"
                            class="flex items-center space-x-2">
                            <button 
                                @click="isOpen = !isOpen"
                                class="relative border bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="#000000" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32.055 32.055" xml:space="preserve" stroke="#000000" stroke-width="0.00032055"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M3.968,12.061C1.775,12.061,0,13.835,0,16.027c0,2.192,1.773,3.967,3.968,3.967c2.189,0,3.966-1.772,3.966-3.967 C7.934,13.835,6.157,12.061,3.968,12.061z M16.233,12.061c-2.188,0-3.968,1.773-3.968,3.965c0,2.192,1.778,3.967,3.968,3.967 s3.97-1.772,3.97-3.967C20.201,13.835,18.423,12.061,16.233,12.061z M28.09,12.061c-2.192,0-3.969,1.774-3.969,3.967 c0,2.19,1.774,3.965,3.969,3.965c2.188,0,3.965-1.772,3.965-3.965S30.278,12.061,28.09,12.061z"></path> </g> </g></svg>
                                <ul 
                                    x-cloak
                                    x-show.transition.origin.top.left = "isOpen"
                                    @click.away = "isOpen = false"
                                    @keydown.excape.window="isOpen = false"
                                    class="z-10 text-left absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0 z-10">
                                    <li>
                                        <a href="" class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Mark as spam</a>
                                    </li>
                                    <li>
                                        <a href="" class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Delete Post</a>
                                    </li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

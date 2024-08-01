<div 
    x-data="{isOpen: false}"
    class="relative">
    <button 
        @click="
            isOpen = !isOpen
            if (isOpen) {
                Livewire.dispatch('getNotifications')
            }
            "
        >
        <svg  viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-gray-400">
            <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z" clip-rule="evenodd" />
        </svg>
        @if ($notificationCount > 0)
            <div class="absolute rounded-full bg-red text-white text-xs w-5 h-5 flex justify-center items-center border-2 -top-1 -right-1 ">
                {{$notificationCount}}
            </div>
        @endif
    </button>
    <ul 
        x-cloak
        x-show.transition.origin.top = "isOpen"
        @click.away = "isOpen = false"
        @keydown.excape.window="isOpen = false"
        class=" text-left absolute w-76 md:w-96 text-gray-700 bg-white shadow-dialog rounded-xlmd:ml-8 max-h-128 overflow-y-auto z-10 -right-28 md:-right-12"
        >
        @if ($notifications->isNotEmpty() && ! $isLoading)
            @foreach ($notifications as $notification)
                <li>
                    <a 
                        href="{{route('idea.show', $notification->data['idea_slug'])}}" 
                        @click.prevent = "
                            isOpen = false
                            "
                        wire:click.prevent="markAsRead('{{$notification->id}}')"
                        class="flex hover:bg-gray-100 text-sm px-5 py-3 transition duration-150 ease-in">
                        <img src="{{$notification->data['user_avatar']}}" alt="avatar"
                        class="w-10 h-10 rounded-full">
                        <div class="ml-4">
                            <div class="line-clamp-6">
                                <span class="font-semibold">{{$notification->data['user_name']}}</span>
                                commented on 
                                <span class="font-semibold">{{$notification->data['idea_title']}}</span>:
                                <span>"{{$notification->data['comment_body']}}"</span>
                            </div>
                            <div class="text-xs text-gray-500 mt-2">{{$notification->created_at->diffForHumans()}}</div>
                        </div>
                    </a>
                </li>
            @endforeach
            <li class="border-t border-gray-300 text-center">
                <button
                    wire:click="markAllAsRead"
                    @click = "isOpen = false"
                    class="block w-full font-semibold hover:bg-gray-100 text-sm px-5 py-3 transition duration-150 ease-in">
                    Mark all as red
                </button>
            </li>
        @elseif ($isLoading)
            @foreach (range(1,3) as $item)
                <li class="animate-pulse flex items-center px-5 py-3 transition duration-150 ease-in">
                    <div class="bg-gray-200 rounded-xl w-10 h-10"></div>
                    <div class="flex-1 ml-4 space-y-2">
                        <div class="bg-gray-200 w-full rounded h-4"></div>
                        <div class="bg-gray-200 w-full rounded h-4"></div>
                        <div class="bg-gray-200 w-1/2 rounded h-4"></div>
                    </div>
                </li>
            @endforeach
        @else
            <li class="mx-auto w-40 my-6">
                <img src="{{asset('img/no-ideas.svg')}}" alt="no idea" class="mx-auto" style="mix-blend-mode: luminosity">
                <div class="text-gra-400 text-center font-bold mt-6">
                    No new notifications
                </div>
            </li>
        @endif
    </ul>
</div>   
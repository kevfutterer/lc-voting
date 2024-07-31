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

    <livewire:idea-comments :idea="$idea" />

    {{-- <x-notification-success /> --}}
    
    @can('update', $idea)
        <livewire:edit-idea :idea="$idea" />
    @endcan

    @can('delete', $idea)
        <livewire:delete-idea :idea="$idea" />
    @endcan

    @auth
        <livewire:mark-idea-as-spam :idea="$idea" />
    @endauth

    @admin
        <livewire:mark-idea-as-not-spam :idea="$idea" />
    @endadmin

    @auth
        <livewire:edit-comment />
    @endauth

    @auth
        <livewire:delete-comment />
    @endauth

    @auth
        <livewire:mark-comment-as-spam />
    @endauth

    @admin
        <livewire:mark-comment-not-as-spam />
    @endadmin

</x-app-layout>

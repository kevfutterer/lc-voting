<?php

namespace App\Livewire;

use Livewire\Component;

class CommentNotifications extends Component
{
    public $notifications;
    public $notificationCount;
    public $isLoading;
    const NOTIFICATION_THRESHOLD = 9;

    protected $listeners = ['getNotifications'];

    public function mount()
    {
        $this->notifications = collect([]);
        $this->isLoading = true;
        $this->notificationCount();
    }

    public function notificationCount()
    {
        $this->notificationCount = auth()->user()->unreadNotifications()->count();
        if ($this->notificationCount > self::NOTIFICATION_THRESHOLD) {
            $this->notificationCount = self::NOTIFICATION_THRESHOLD . '+';
        }
    }

    public function getNotifications()
    {
        $this->notifications = auth()->user()
            ->unreadNotifications()
            ->latest()
            ->take(self::NOTIFICATION_THRESHOLD)
            ->get();
        
        $this->isLoading = false;
    }

    public function render()
    {
        return view('livewire.comment-notifications');
    }
}

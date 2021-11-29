<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AttendanceEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $camera;
    private $users;
    private $companyId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($camera, $users, $companyId)
    {
        $this->camera = $camera;
        $this->companyId = $companyId;
        $this->users = $users;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // private channel will have prfix of private-
        return new PrivateChannel('company-monitor.'.$this->companyId);
    }

    public function broadcastAs()
    {
        return 'show.attendance';
    }

    public function broadcastWith()
    {
        $users = [];
        foreach ($this->users as $user) {
            $users[] = [
                'name' => $user->name,
                'photo' => $user->photo_url
            ];
        }

        return [
            'camera' => ucfirst($this->camera),
            'users' => $users
        ];
    }
}

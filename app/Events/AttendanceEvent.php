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
    private $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($camera, $user)
    {
        $this->camera = $camera;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // private channel will have prfix of private-
        return new PrivateChannel('company-monitor.'.$this->user->company_id);
    }

    public function broadcastAs()
    {
        return 'show.attendance';
    }

    public function broadcastWith()
    {
        return [
            'camera' => ucfirst($this->camera),
            'name' => $this->user->name,
            'photo' => $this->user->photo_url
        ];
    }
}

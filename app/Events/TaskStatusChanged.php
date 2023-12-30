<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskStatusChanged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * TaskStatusChanged constructor.
     * @param $taskId
     * @param $newStatus
     */
    public function __construct(public $taskId,public $newStatus)
    {
        //
    }

    public function broadcastOn()
    {
        return new Channel('task-status-channel');
    }

    public function broadcastAs()
    {
        return 'task.status.changed';
    }

    public function broadcastWith()
    {
        return [
            'taskId' => $this->taskId,
            'newStatus' => $this->newStatus,
        ];
    }
}

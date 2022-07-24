<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $messageArray;


    public function __construct(array $messageArray)
    {
        $this->messageArray = $messageArray;
    }



    public function broadcastOn()
    {
        return new Channel('chat'.$this->messageArray['id']);
    }
}

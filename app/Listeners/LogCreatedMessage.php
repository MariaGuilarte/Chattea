<?php

namespace App\Listeners;

use App\Events\CreatedMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class LogCreatedMessage
{
    public function __construct()
    {
        //
    }

    public function handle(CreatedMessage $event)
    {
      Storage::disk('local')->append('events_log.txt', $event->message->body . " From: " . $event->message->sender . " To: " . $event->message->receiver);
    }
}

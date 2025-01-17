<?php

namespace Cebugle\Totem\Listeners;

use Cebugle\Totem\Events\Event;

class BuildCache extends Listener
{
    /**
     * Handle the event.
     *
     * @param  Event  $event
     */
    public function handle(Event $event)
    {
        $this->build($event);
    }

    /**
     * Rebuild Cache.
     *
     * @param  Event  $event
     */
    protected function build(Event $event)
    {
        if ($event->task) {
            $this->tasks->find($event->task->id);
        }
    }
}

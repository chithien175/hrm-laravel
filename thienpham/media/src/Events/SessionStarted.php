<?php

namespace Botble\Media\Events;

use Illuminate\Foundation\Events\Dispatchable;

class SessionStarted
{
    use Dispatchable;

    /**
     * The active session store.
     *
     * @var  \Illuminate\Session\Store $session
     */
    public $session;

    /**
     * Create a new event instance.
     *
     * @param  \Illuminate\Session\Store $session
     * @return void
     */
    public function __construct($session)
    {
        $this->session = $session;
    }
}

<?php

namespace Flasher\Support;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;

class Notifier
{
    const DANGER = 'danger';

    const INFO = 'info';

    const SUCCESS = 'success';

    const WARNING = 'warning';

    /**
     * Flash an alert message to the Session.
     *
     * @param string $message
     * @param string $level
     */
    public function alert(string $message, string $level)
    {
        $this->flash('alerts', $message, $level);
    }

    /**
     * Flash an interruption message to the Session.
     *
     * @param string $message
     * @param string $level
     */
    public function interruption(string $message, string $level)
    {
        $this->flash('interruption', $message, $level);
    }

    /**
     * Flash message to the Session.
     *
     * @param string $type
     * @param string $message
     * @param string $level
     *
     * @return $this
     */
    protected function flash(string $type, string $message, string $level)
    {
        $group = Session::get($type, new MessageBag());

        Session::flash($type, $group->add($level, $message));

        return $this;
    }
}

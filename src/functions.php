<?php

if (! function_exists('flasher')) {

    /**
     * Resolve Flasher from IOC.
     *
     * @return \Illuminate\Foundation\Application|mixed
     */
    function flasher()
    {
        return app('flasher');
    }
}

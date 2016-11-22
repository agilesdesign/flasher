<?php

namespace Flasher\Middleware;

use Closure;
use Illuminate\Support\MessageBag;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ShareFlasherMessagesFromSession
{
    /**
     * The view factory implementation.
     *
     * @var \Illuminate\Contracts\View\Factory
     */
    protected $view;

    /**
     * ShareFlasherMessagesFromSession constructor.
     *
     * @param \Illuminate\Contracts\View\Factory $view
     */
    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // If the current session has an "errors" variable bound to it, we will share
        // its value with all view instances so the views can easily access errors
        // without having to bind. An empty bag is set when there aren't errors.
        $this->view->share(
            'alerts', $request->session()->get('alerts') ?: new MessageBag()
        );

        $this->view->share(
            'interruption', $request->session()->get('interruption') ?: new MessageBag()
        );

        // Putting the errors in the view for every view allows the developer to just
        // assume that some errors are always available, which is convenient since
        // they don't have to continually run checks for the presence of errors.

        return $next($request);
    }
}

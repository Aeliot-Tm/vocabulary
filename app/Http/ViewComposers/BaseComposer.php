<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BaseComposer
{
    /**
     * @var Request
     */
    private $request;

    /**
     * Create a new profile composer.
     *
     * @param  Request $request
     */
    public function __construct(Request $request)
    {
        // Dependencies automatically resolved by service container...
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('user', $this->request->user());
    }
}
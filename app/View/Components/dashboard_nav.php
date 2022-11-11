<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\AdminLogin;

class dashboard_nav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $dashboard;
    public function __construct()
    {
        //

        $this->dashboard=AdminLogin::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard_nav');
    }
}

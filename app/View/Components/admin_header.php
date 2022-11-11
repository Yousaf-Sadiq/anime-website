<?php

namespace App\View\Components;

use Illuminate\View\Component;
use app\Models\Anime_settings;

class admin_header extends Component
{
    public $abc;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin_header');
    }
}

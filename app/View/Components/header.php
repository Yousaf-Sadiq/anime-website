<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\add_anime_category;


class header extends Component
{
    public $category;
    public $title;
    public $keys;
    public $desc;
    public $meta_keys;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title="Anime | template",$desc="anime website free",$keys='[{"value":"seven"},{"value":"deadly"},{"value":"sin"},{"value":"seven deadly sin"},{"value":"anime"}]')

    {
        //
            # code...
            $this->title = $title;


        $this->desc = $desc;
        // $this->keys=$keys;
        $this->keys =(array)json_decode($keys,true);

        for ($i=0; $i < count($this->keys); $i++) {
             $this->meta_keys.= $this->keys[$i]["value"] .",";
            }
// echo $this->meta_keys;

        // pre($this->keys);
        // var_dump($this->keys);
        // echo $this->title;
        $this->category = add_anime_category::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}

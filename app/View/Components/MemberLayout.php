<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MemberLayout extends Component
{
    public $title;
    public $alpineData;
    public $phpData;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $alpineData = "", $phpData = "")
    {
        $this->title = $title;
        $this->alpineData  = $alpineData;
        $this->phpData = $phpData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('client.layouts.member');
    }
}

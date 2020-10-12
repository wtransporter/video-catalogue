<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VideoCard extends Component
{
    public $item;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($article)
    {
        $this->item = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.video-card', );
    }
}

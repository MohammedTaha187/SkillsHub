<?php

namespace App\View\Components;

use Closure;
use App\Models\Cat;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data['cats'] = Cat::select('id' , 'name')->get();
        return view('components.navbar')->with($data);
    }
}

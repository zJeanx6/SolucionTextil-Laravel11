<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalError extends Component
{
    public $show;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Verificamos si hay errores en la sesión
        $this->show = session()->has('errors');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-error', ['show' => $this->show]);
    }
}

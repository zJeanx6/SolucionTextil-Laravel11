<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalDeleteConfirm extends Component
{
    public $action;
    public $message;

    /**
     * Create a new component instance.
     */
    public function __construct($action = '', $message = '¿Estás seguro de que deseas eliminar este elemento?')
    {
        $this->action = $action;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-delete-confirm', [
            'action' => $this->action,
            'message' => $this->message,
        ]);
    }
}

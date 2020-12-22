<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Flash extends Component
{
    public $message;
    public $type;
    public $colors = [
        'error' => 'border-red-400 text-red-700 bg-red-200',
        'success' => 'border-green-400 text-green-700 bg-green-200',
        'warning' => 'border-yellow-400 text-yellow-700 bg-yellow-200',
        'info' => 'border-blue-400 text-blue-700 bg-blue-200',
    ];
    protected $listeners = ['flash' => 'setFlashMessage'];

    public function setFlashMessage($message, $type)
    {
        $this->message = $message;
        $this->type = $type;

        $this->dispatchBrowserEvent('flash-message');
    }

    public function render()
    {
        return view('livewire.flash');
    }
}

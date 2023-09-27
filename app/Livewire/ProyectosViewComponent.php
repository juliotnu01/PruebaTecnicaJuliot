<?php

namespace App\Livewire;
use App\Models\Proyecto;
use Livewire\Component;

class ProyectosViewComponent extends Component
{
    public $proyectos;

    public function mount()
    {
        $this->proyectos = Proyecto::with(['belongsToUser'])->where('isBorrador', 0)->get();
    }


    public function render()
    {
        return view('livewire.proyectos-view-component', [
            "proyectos"  => $this->proyectos 
        ]);
    }
    
}

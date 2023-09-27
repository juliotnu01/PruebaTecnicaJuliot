<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Proyecto;
use Livewire\WithFileUploads;

class Proyectos extends Component
{
    use WithFileUploads;

    public $titulo = '';
    public $descripcion = '';
    public $img;
    public $isBorrador = false;
    public $proyectos ;


    public function mount()
    {
        $this->proyectos = Proyecto::with(['belongsToUser'])->where('user_id', auth()->id())->get();
    }


    public function render()
    {
        return view('livewire.proyectos', [
            "proyectos"  => $this->proyectos 
        ]);
    }
    /**
     * 
     * funcion del componente que permite guardar|crear un registro en la base de datos 
     * 
     * @return void
     */
    public function store()
    {
            $idUser = auth()->id();
            $url = asset($this->img->storePublicly("photos/user_$idUser", 'public')) ;
            $proyecto = new Proyecto();
            $proyecto->titulo = $this->titulo;
            $proyecto->descripcion = $this->descripcion;
            $proyecto->url_img = $url;
            $proyecto->isBorrador = $this->isBorrador;
            $proyecto->user_id = $idUser;
            $proyecto->save();
            $this->reset(); 
            $this->proyectos = Proyecto::with(['belongsToUser'])->where('user_id', auth()->id())->get();
        
        
    }

    public function toggleIsBorrador($index)
    {
        $registro = $this->proyectos[$index];
        $registro->update([
            'isBorrador' => !$registro->isBorrador,
        ]);
    }

    public function DeleteRegistro($id){
        Proyecto::find($id)->delete();
        $this->proyectos = Proyecto::with(['belongsToUser'])->where('user_id', auth()->id())->get();
    }

}

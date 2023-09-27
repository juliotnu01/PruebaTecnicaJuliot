<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * relacion de a que usuario pertenece el proyecto
     */
    function belongsToUser(){
       return $this->belongsTo(User::class, 'user_id'); 
    }
    
}

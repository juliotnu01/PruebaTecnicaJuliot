<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Proyectos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProyectosTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Proyectos::class)
            ->assertStatus(200);
    }
}

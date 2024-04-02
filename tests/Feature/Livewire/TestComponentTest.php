<?php

namespace Tests\Feature\Livewire;

use App\Livewire\TestComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TestComponentTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(TestComponent::class)
            ->assertStatus(200);
    }
}

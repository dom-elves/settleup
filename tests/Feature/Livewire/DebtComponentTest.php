<?php

namespace Tests\Feature\Livewire;

use App\Livewire\DebtComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DebtComponentTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(DebtComponent::class)
            ->assertStatus(200);
    }
}

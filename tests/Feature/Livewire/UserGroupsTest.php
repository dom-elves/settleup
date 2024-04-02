<?php

namespace Tests\Feature\Livewire;

use App\Livewire\UserGroups;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserGroupsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(UserGroups::class)
            ->assertStatus(200);
    }
}

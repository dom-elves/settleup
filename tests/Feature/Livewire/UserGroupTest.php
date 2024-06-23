<?php

namespace Tests\Feature\Livewire;

use App\Livewire\UserGroups;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use App\Models\Group;

class UserGroupTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        $group = Group::factory()->create([
            'user_ids' => json_encode([1, 2, 3]),
        ]);

        
        $response = $this->get('/group/' . $group->name);

        Livewire::test(UserGroup::class)
            ->assertStatus(200);
    }
}

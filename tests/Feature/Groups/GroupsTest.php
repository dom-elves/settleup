<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Group;

class GroupsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $group = Group::factory()->create([
            'user_ids' => json_encode([1, 2, 3]),
        ]);

        
        $response = $this->get('/group/' . $group->name);

        $response->assertStatus(200);
    }
}

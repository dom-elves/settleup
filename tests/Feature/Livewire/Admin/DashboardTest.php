<?php
 
namespace Tests\Feature\Livewire;
 
use App\Livewire\ShowPosts;
use Livewire\Livewire;
use App\Models\Group;
use App\Models\User;
use Tests\TestCase;
 
class DashboardTest extends TestCase
{
    /** @test */
    public function user_has_group_data_at_login()
    {
        $this->assertTrue(true); 
    }
}

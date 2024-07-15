<?php

namespace Tests\Feature;

use App\Jobs\NotifyAllVoters;
use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use App\Livewire\SetStatus;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SetStatusTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_show_page_contains_set_status_livewire_component_when_user_is_loggen_in_and_doesnt_if_not_loggin_in(): void
    {
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        $category = Category::factory()->create([
            'name' => 'Category 1',
        ]);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My first idea',
            'category_id' => $category->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of first idea',
        ]);

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('set-status');

        $this->actingAs($userB)
            ->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('set-status');
    }

    public function test_initial_status_is_set_correctly(): void
    {
        $user = User::factory()->create();

        $statusConsidering = Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-gray-200']);

        $categoryOne = Category::factory()->create([
            'name' => 'Category 1',
        ]);

        $categoryTwo = Category::factory()->create([
            'name' => 'Category 2',
        ]);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My first idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusConsidering->id,
            'description' => 'Description of first idea',
        ]);

       Livewire::actingAs($user)
            ->test(SetStatus::class, [
                'idea' => $idea
            ])
            ->assertSet('status', $statusConsidering->id);
    }

    public function test_can_set_status_correctly(): void
    {
        $user = User::factory()->create();

        $statusConsidering = Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-gray-200']);
        $statusInProgress = Status::factory()->create(['name' => 'InProgress', 'classes' => 'bg-gray-200']);

        $categoryOne = Category::factory()->create([
            'name' => 'Category 1',
        ]);

        $categoryTwo = Category::factory()->create([
            'name' => 'Category 2',
        ]);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My first idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusConsidering->id,
            'description' => 'Description of first idea',
        ]);

       Livewire::actingAs($user)
            ->test(SetStatus::class, [
                'idea' => $idea
            ])
            ->set('status', $statusInProgress->id)
            ->call('setStatus')
            ->assertDispatched('statusWasUpdated');
        
        $this->assertDatabaseHas('ideas', [
            'id' => $idea->id,
            'status_id' => $statusInProgress->id,
        ]);
    }

    public function test_can_set_status_correctly_while_notifying_all_voter(): void
    {
        $user = User::factory()->create();

        $statusConsidering = Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-gray-200']);
        $statusInProgress = Status::factory()->create(['name' => 'InProgress', 'classes' => 'bg-gray-200']);

        $categoryOne = Category::factory()->create([
            'name' => 'Category 1',
        ]);

        $categoryTwo = Category::factory()->create([
            'name' => 'Category 2',
        ]);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My first idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusConsidering->id,
            'description' => 'Description of first idea',
        ]);

        Queue::fake();
        Queue::assertNothingPushed();

        Livewire::actingAs($user)
            ->test(SetStatus::class, [
                'idea' => $idea
            ])
            ->set('status', $statusInProgress->id)
            ->set('notifyAllVoters', true)
            ->call('setStatus')
            ->assertDispatched('statusWasUpdated');

        Queue::assertPushed(NotifyAllVoters::class);
        
        
    }
}

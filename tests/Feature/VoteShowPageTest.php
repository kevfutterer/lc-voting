<?php

namespace Tests\Feature;

use App\Livewire\IdeaShow;
use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class VoteShowPageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_show_page_contains_idea_show_livewire_component(): void
    {
        $user = User::factory()->create();

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

        $this->get(route('idea.show', $idea))
            ->assertSeeLivewire('idea-show');
    }

    public function test_show_page_correctly_recieves_votes_count(): void
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

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userB->id,
        ]);

        $this->get(route('idea.show', $idea))
            ->assertViewHas('votesCount', 2);
    }

    public function test_votes_count_shows_correctly_on_show_page_livewire_component(): void
    {
        $user = User::factory()->create();

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

        Livewire::test(IdeaShow::class, [
            'idea' => $idea,
            'votesCount' => 5,
        ])
            ->assertSet('votesCount', 5);
    }

    public function test_user_who_is_logged_in_shows_voted_if_idea_already_voted_for(): void
    {
        $user = User::factory()->create();

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

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
        ]);

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 5,
            ])
            ->assertSet('hasVoted', true);
    }
}

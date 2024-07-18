<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Category;
use App\Livewire\EditIdea;
use App\Livewire\IdeaShow;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditIdeaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_shows_edit_idea_livewire_component_when_user_has_authorization(): void
    {
        $user = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('edit-idea');
    }

    public function test_does_not_shows_edit_idea_livewire_component_when_user_does_not_have_authorization(): void
    {
        $user = User::factory()->create();
        $idea = Idea::factory()->create([]);

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('edit-idea');
    }

    public function test_edit_idea_form_validation_works(): void
    {
        $user = User::factory()->create();
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);

        Livewire::actingAs($user)
            ->test(EditIdea::class, [
                'idea' => $idea,
            ])
            ->set('title', '')
            ->set('category', '')
            ->set('description', '')
            ->call('updateIdea')
            ->assertHasErrors(['title', 'category', 'description']);
    }

    public function test_editing_an_idea_works_when_user_has_authorization(): void
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1',]);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2',]);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne,
        ]);

        Livewire::actingAs($user)
            ->test(EditIdea::class, [
                'idea' => $idea,
            ])
            ->set('title', 'My edited Idea')
            ->set('category', $categoryTwo->id)
            ->set('description', 'This is my edited Idea')
            ->call('updateIdea')
            ->assertDispatched('ideaWasUpdated');
        
        $this->assertDatabaseHas('ideas', [
            'title' => 'My edited Idea',
            'description' => 'This is my edited Idea',
            'category_id' => $categoryTwo->id,
        ]);
    }

    public function test_editing_an_idea_shows_on_menu_when_user_has_authorization(): void
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 4,
            ])
            ->assertSee('Edit Idea');
    
    }

    public function test_editing_an_idea_does_not_show_on_menu_when_user_does_not_have_authorization(): void
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create([]);

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 4,
            ])
            ->assertDontSee('Edit Idea');
    
    }

    public function test_editing_an_idea_does_not_works_when_user_has_does_not_have_authorization_because_different_user_created_idea(): void
    {
        $user = User::factory()->create();
        $userB = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1',]);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2',]);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne,
        ]);

        Livewire::actingAs($userB)
            ->test(EditIdea::class, [
                'idea' => $idea,
            ])
            ->set('title', 'My edited Idea')
            ->set('category', $categoryTwo->id)
            ->set('description', 'This is my edited Idea')
            ->call('updateIdea')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function test_editing_an_idea_does_not_works_when_user_has_does_not_have_authorization_because_idea_was_created_longer_than_1_hour_ago(): void
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1',]);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2',]);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne,
            'created_at' => now()->subhours(2),
        ]);

        Livewire::actingAs($user)
            ->test(EditIdea::class, [
                'idea' => $idea,
            ])
            ->set('title', 'My edited Idea')
            ->set('category', $categoryTwo->id)
            ->set('description', 'This is my edited Idea')
            ->call('updateIdea')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }
}

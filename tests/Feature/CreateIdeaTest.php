<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use App\Livewire\CreateIdea;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateIdeaTest extends TestCase
{
    use RefreshDatabase;
    public function test_create_idea_form_does_not_show_when_logged_out(): void
    {
        $response = $this->get(route('idea.index'));
        $response->assertSuccessful();
        $response->assertSee('Please login to create an idea');
        $response->assertDontSee('Let us know what you would like and we\'ll take a look over');
        
    }

    public function test_create_idea_form_does_show_when_logged_in(): void
    {
        $response = $this->actingAs(User::factory()->create())->get(route('idea.index'));
        
        $response->assertSuccessful();
        $response->assertDontSee('Please login to create an idea');
        $response->assertSee('Let us know what you would like and we\'ll take a look over', false);
        
    }

    public function test_main_page_contain_create_idea_livewire_component(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(route('idea.index'))
            ->assertSeeLivewire('create-idea');
        
    }

    public function test_create_idea_form_validation_works(): void
    {
        Livewire::actingAs(User::factory()->create())
            ->test(CreateIdea::class)
            ->set('title', '')
            ->set('category', '')
            ->set('description', '')
            ->call('createIdea')
            ->assertHasErrors(['title', 'category', 'description']);
    }

    public function test_creating_an_idea_works_correctly(): void
    {
        $user = User::factory()->create();
        $categoryOne = Category::factory()->create([
            'name' => 'Category 1',
        ]);
        $categoryTwo = Category::factory()->create([
            'name' => 'Category 2',
        ]);
        $statusOpen = Status::factory()->create(['name' => 'Open' , 'classes' => 'bg-gray-200']);

        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', 'My first Idea')
            ->set('category', $categoryOne->id)
            ->set('description', 'Description of first idea')
            ->call('createIdea')
            ->assertRedirect('/');
        
        $response = $this->actingAs($user)->get(route('idea.index'));
        $response->assertSuccessful();
        $response->assertSee('My first Idea');
        $response->assertSee('Description of first idea');
    }
}

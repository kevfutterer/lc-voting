<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_list_of_ideas_shows_on_main_page(): void
    {
        $ideaOne = Idea::factory()->create([
            'title' => 'My first idea',
            'description' => 'Description of first idea',
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My second idea',
            'description' => 'Description of second idea',
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
    }

    /**
     * A basic feature test example.
     */
    public function test_single_idea_shows_correctly_on_the_show_page(): void
    {
        $ideaOne = Idea::factory()->create([
            'title' => 'My first idea',
            'description' => 'Description of first idea',
        ]);

        $response = $this->get(route('idea.show', $ideaOne));

        $response->assertSuccessful();

        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
    }

    public function test_ideas_pagination_works(): void
    {
        $ideas = Idea::factory(Idea::PAGINATION_COUNT + 1)->create();

        $ideaOne = $ideas[0];
        $ideaOne->title = "My First Idea";
        $ideaOne->save();

        $ideaEleven = $ideas[10];
        $ideaEleven->title = "My Eleven Idea";
        $ideaEleven->save();

        $response = $this->get(route('idea.index'));
        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);
    }
}

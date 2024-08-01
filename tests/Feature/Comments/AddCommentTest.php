<?php

namespace Tests\Feature\Comments;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Comment;
use App\Livewire\AddComment;
use App\Notifications\CommentAdded;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddCommentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_add_comment_livewire_component_renders(): void
    {
        $idea = Idea::factory()->create();

        $this->get(route('idea.show', $idea))
            ->assertSeeLivewire('add-comment');
    }

    public function test_add_comment_form_does_render_when_user_is_logged_in(): void
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        $this->actingAs($user)->get(route('idea.show', $idea))
            ->assertSee('Share your thoughts');
    }

    public function test_add_comment_form_does_not_render_when_user_is_logged_out(): void
    {
        $idea = Idea::factory()->create();

        $this->get(route('idea.show', $idea))
            ->assertSee('Please login or create an account');
    }

    public function test_add_comment_form_validation_works(): void
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create();

        Livewire::actingAs($user)
            ->test(AddComment::class, [
                'idea' => $idea
            ])
            ->set('comment', '')
            ->call('addComment')
            ->assertHasErrors(['comment'])
            ->set('comment', 'df')
            ->call('addComment')
            ->assertHasErrors(['comment']);
    }

    public function test_add_comment_form_works(): void
    {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        Notification::fake();

        Notification::assertNothgingSent();

        Livewire::actingAs($user)
            ->test(AddComment::class, [
                'idea' => $idea
            ])
            ->set('comment', 'This is my first comment')
            ->call('addComment')
            ->assertDispatched('commentWasAdded');

        Notification::assertSentTo(
            [$idea->user],
            CommentAdded::class
        );
        
        $this->assertEquals(1, Comment::count());
    }
}

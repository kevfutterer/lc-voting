<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Comment;
use App\Models\Category;
use App\Livewire\EditIdea;
use App\Livewire\IdeaShow;
use App\Livewire\EditComment;
use App\Livewire\IdeaComment;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditCommentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_shows_edit_comment_livewire_component_when_user_has_authorization(): void
    {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $this->actingAs($user)
            ->get(route('idea.show', $idea))
            ->assertSeeLivewire('edit-comment');
    }

    public function test_does_not_shows_edit_comment_livewire_component_when_user_does_not_have_authorization(): void
    {
        $user = User::factory()->create();
        $idea = Idea::factory()->create([]);

        $this->get(route('idea.show', $idea))
            ->assertDontSeeLivewire('edit-comment');
    }

    public function test_edit_comment_is_set_correctly_when_user_clicks_it_from_menu()
    {
        $user = User::factory()->create();
        $idea = Idea::factory()->create([]);

        $comment = Comment::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
            'body' => 'This is my first comment',
        ]);

        Livewire::actingAs($user)
            ->test(EditComment::class)
            ->call('setEditComment', $comment->id)
            ->assertSet('body', $comment->body)
            ->assertDispatched('editCommentWasSet');

    }

    public function test_edit_comment_form_validation_works(): void
    {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
            'body' => 'This is my first comment',
        ]);

        Livewire::actingAs($user)
            ->test(EditComment::class)
            ->call('setEditComment', $comment->id)
            ->set('body', '')
            ->call('updateComment')
            ->assertHasErrors(['body'])
            ->set('body', 'dd')
            ->call('updateComment')
            ->assertHasErrors(['body']);
    }

    public function test_editing_a_comment_works_when_user_has_authorization(): void
    {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
            'body' => 'This is my first comment',
        ]);

        Livewire::actingAs($user)
            ->test(EditComment::class)
            ->call('setEditComment', $comment->id)
            ->set('body', 'This is my updated Comment')
            ->call('updateComment')
            ->assertDispatched('commentWasUpdated');
        
        $this->assertEquals('This is my updated Comment', Comment::first()->body);
    }

    public function test_editing_a_comment_does_not_show_on_menu_when_user_does_not_have_authorization(): void
    {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create([
            'idea_id' => $idea->id,
            'body' => 'This is my first comment',
        ]);

        Livewire::actingAs($user)
            ->test(EditComment::class)
            ->call('setEditComment', $comment->id)
            ->set('body', 'This is my updated Comment')
            ->call('updateComment')
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function test_editing_a_comment_shows_on_menu_when_user_has_authorization(): void
    {
        $user = User::factory()->create();
        $idea = Idea::factory()->create();

        $comment = Comment::factory()->create([
            'user_id' => $user->id,
            'idea_id' => $idea->id,
            'body' => 'This is my first comment',
        ]);

        Livewire::actingAs($user)
            ->test(IdeaComment::class, [
                'comment' => $comment,
                'ideaUserId' => $idea->user_id,
            ])
            ->assertSee('Edit Comment');
    }

}

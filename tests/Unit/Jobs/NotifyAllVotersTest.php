<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use App\Models\Category;
use App\Jobs\NotifyAllVoters;
use App\Mail\IdeaStatusUpdatedMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotifyAllVotersTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_it_sends_an_email_to_all_voters(): void
    {
        $user = User::factory()->create([
            'email' => 'kevin.futterer@gmail.com'
        ]);
        $userB = User::factory()->create([
            'email' => 'user@user.com'
        ]);

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

        Mail::fake();

        NotifyAllVoters::dispatch($idea);

        Mail::assertQueued(IdeaStatusUpdatedMailable::class, function ($mail) {
            return $mail->hasTo('kevin.futterer@gmail.com');
        });
        Mail::assertQueued(IdeaStatusUpdatedMailable::class, function ($mail) {
            return $mail->hasTo('user@user.com');
        });

    }
}

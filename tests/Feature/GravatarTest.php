<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GravatarTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_user_can_generate_gravatar_defaul_image_when_no_email_found_a(): void
    {
        $user = User::factory()->create([
            'name' => 'Andre',
            'email' => 'afakeemail@ksjdf.com',
        ]);
        $gravatarURL = $user->getAvatar();

        $this->assertEquals(
            'https://gravatar.com/avatar/' . md5($user->email) . '?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-1.png',
            $gravatarURL
        );

        $response = Http::get($user->getAvatar());
        $this->assertTrue($response->successful());
    }

    public function test_user_can_generate_gravatar_defaul_image_when_no_email_found_0(): void
    {
        $user = User::factory()->create([
            'name' => 'Andre',
            'email' => '0fakeemail@ksjdf.com',
        ]);
        $gravatarURL = $user->getAvatar();

        $this->assertEquals(
            'https://gravatar.com/avatar/' . md5($user->email) . '?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-27.png',
            $gravatarURL
        );
        $response = Http::get($user->getAvatar());
        $this->assertTrue($response->successful());
    }
}

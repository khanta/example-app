<?php

namespace Tests\Feature\Tweet;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_delete_successed()
    {
        // ユーザーを作成
        $user = User::factory()->create();

        // つぶやきを作成
        $tweet = Tweet::factory()->create(['user_id' => $user->id]);

        // 指定したユーザーでログインした状態にする
        $this->actingAs($user);

        // 作成したつぶやきIDを指定
        $response = $this->delete('/tweet/delete/' . $tweet->id);

        $response->assertRedirect('/tweet');
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CanLikeStatusesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @test
     */
    public function an_authenticated_user_can_like_statuses()
    {
        $user = factory(User::class)->create();
        $status = factory(Status::class)->create();

        $this->actingAs($user)->postJson(route('statuses.like.store', $status));
        
        $this->assertDatabaseHas('like', [
            'user_id' => $user->id,
            'status_id' => $status->id
        ]);



    }
}

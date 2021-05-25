<?php

namespace Tests\Unit\Http\Resoruces;

use Tests\TestCase;
use App\Models\Status;
use App\Http\Resources\StatusResource;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusResourceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @test
     */
    public function a_status_resources_must_have_the_necessary_fields()
    {
        $status  = factory(Status::class)->create();
        $statusResource = StatusResource::make($status)->resolve();


        $this->assertEquals(
            $status->body,
            $statusResource['body']
        );
        $this->assertEquals(
            $status->user->name,
            $statusResource['user_name']
        );
        $this->assertEquals(
            'https://codahosted.io/docs/IZn3UNbEOU/blobs/bl-gn3EiJrUjd/31fe4b1bce7a206c58f7e89c75be122c1c38fb2c067ebe71b7d8ab98810ff5223c8cd31eaa69060a1d6945764e217b44561cb607140d4f3fc0412290eae8e9fdfb32d607144c0e5ddeb4ccacabc987df43d14b74f855a0842a7e14c195ecb29452a70664',
             $statusResource['user_avatar']
        );
        $this->assertEquals(
            $status->created_at->diffForHumans(),
            $statusResource['ago']
        );

    }
}

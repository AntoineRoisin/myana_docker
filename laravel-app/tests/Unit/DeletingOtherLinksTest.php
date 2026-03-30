<?php

namespace Tests\Unit;

use App\Models\ShortLink;
use App\Models\User;
use App\Policies\ShortUrlPolicy;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class DeletingOtherLinksTest extends BaseTestCase
{
    /**
     * A basic feature test example.
     */
    public function test_delete_other_link(): void
    {
        $shortLingPolicy = new ShortUrlPolicy();

        $firstUser = User::factory()->create();

        $shortLink = ShortLink::factory()->create(['user_id' => $firstUser, 'url' => 'http://google.com']);

        $secondUser = User::factory()->create();

        $this->actingAs($secondUser);

        $response = $shortLingPolicy->delete($secondUser, $shortLink);

        $this->assertFalse($response->allowed());
    }
}

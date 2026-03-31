<?php

namespace Tests\Unit;

use App\Models\ShortUrl;
use App\Models\User;
use App\Policies\ShortUrlPolicy;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class UpdatingOtherLinksTest extends BaseTestCase
{
    /**
     * A basic feature test example.
     */
    public function test_update_other_link(): void
    {
        $shortLingPolicy = new ShortUrlPolicy();

        $firstUser = User::factory()->create();

        $shortLink = ShortUrl::factory()->create(['user_id' => $firstUser, 'url' => 'http://google.com']);

        $secondUser = User::factory()->create();

        $this->actingAs($secondUser);

        $response = $shortLingPolicy->update($secondUser, $shortLink);

        $this->assertFalse($response->allowed());
    }
}

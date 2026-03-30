<?php

namespace Tests\Feature;

use App\Models\ShortLink;
use App\Policies\ShortUrlPolicy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;

class DeletingOtherLinks extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function delete_other_link(): void
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

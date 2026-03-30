<?php

namespace App\Jobs;

use App\Models\ShortUrl;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CleanExpiredLinks implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $expiredShortUrl = ShortUrl::where('created_at', '<=', Carbon::now()->subMonths(3)->toDateTimeString())->get();

        if($expiredShortUrl) {
            foreach($expiredShortUrl AS $link) {
                $link->delete();
            }
        }
    }
}

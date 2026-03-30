<?php

namespace App\Http\Queries;

use App\Models\ShortUrl;
use App\Traits\Slugify;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class ShortUrlQuery
{

    /**
     * @param $shortUrlId
     * @return ShortUrl
 */
    public function getShortUrl($shortUrlId): ShortUrl
    {
        return ShortUrl::query()->findOrFail($shortUrlId);
    }

    public function getShortUrlByHash($hash): ShortUrl
    {
        return ShortUrl::query()->where('short_url', $hash)->withTrashed()->first();
    }


    public function addVisit(ShortUrl $shortUrl): ShortUrl
    {
        $shortUrl->update(['visits' => $shortUrl->visits++]);
        return $shortUrl;
    }

    /**
     * @param ShortUrl $shortUrl
     * @param array $data
     * @return ShortUrl
     */
    public function updateShortUrl(ShortUrl $shortUrl, array $data): ShortUrl
    {
        $shortUrl->update($data);

        return $shortUrl;
    }

    public function createShortUrl(array $data): ShortUrl
    {
        $shortUrl = ShortUrl::query()->create($data);

        return $shortUrl;
    }

    public function deleteShortUrl(ShortUrl $shortUrl): bool
    {
        return $shortUrl->delete();
    }
}

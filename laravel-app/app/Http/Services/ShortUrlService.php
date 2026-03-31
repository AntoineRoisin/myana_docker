<?php

namespace App\Http\Services;

use App\Http\Queries\ShortUrlQuery;
use App\Models\ShortUrl;

class ShortUrlService
{
    /**
     * @param $shortUrlId
     * @return ShortUrl
     */
    public function getShortUrl($shortUrlId): ShortUrl
    {
        $query = app(ShortUrlQuery::class);

        return $query->getShortUrl($shortUrlId);
    }


    public function addVisit($short_url): ShortUrl
    {
        $query = app(ShortUrlQuery::class);

        return $query->addVisit($short_url);
    }

    public function getShortUrlByHash($hash): ShortUrl
    {
        $query = app(ShortUrlQuery::class);

        return $query->getShortUrlByHash($hash);
    }

    public function updateShortUrl(ShortUrl $shortUrl, $data): ShortUrl
    {
        $query = app(ShortUrlQuery::class);

        return $query->updateShortUrl($shortUrl, $data);
    }

    public function createShortUrl(array $data): ShortUrl
    {
        $query = app(ShortUrlQuery::class);

        return $query->createShortUrl($data);
    }

    public function deleteShortUrl(ShortUrl $shortUrl): bool
    {
        $query = app(ShortUrlQuery::class);

        return $query->deleteShortUrl($shortUrl);
    }
}

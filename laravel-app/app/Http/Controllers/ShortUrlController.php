<?php

namespace App\Http\Controllers;

use App\Http\Queries\ShortUrlQuery;
use App\Http\Requests\ShortUrlRequest;
use App\Http\Services\ShortUrlService;
use App\Models\ShortUrl;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ShortUrlController extends Controller
{
    public function __construct(private readonly ShortUrlService $ShortUrlService)
    {
    }
    public function index()
    {

    }

    public function redirect($short_url): View
    {
        $short_url = $this->ShortUrlService->getShortUrlByHash($short_url);

        $short_url = $this->ShortUrlService->addVisit($short_url);

        return view('shorturl.redirect')->with(['url' => $short_url->url, 'is_deleted' => $short_url->deleted_at ? true : false]);
    }

    public function create(): View
    {
        return view('shorturl.create');
    }

    public function edit($shortUrlId) : View
    {
        $shortUrl = $this->ShortUrlService->getShortUrl($shortUrlId);

        Gate::authorize('view', $shortUrl);

        return view('shorturl.edit')->with(['shortUrl' => $shortUrl]);
    }

    public function update($shortUrlId, ShortUrlRequest $request): RedirectResponse
    {
        $request->validated();

        $shortUrl = $this->ShortUrlService->getShortUrl($shortUrlId);
        Gate::authorize('update', $shortUrl);

        $data = [
            'url' => $request->url
        ];

        $this->ShortUrlService->updateShortUrl($shortUrl, $data);

        return redirect(route('home'));
    }


    public function store(ShortUrlRequest $request) : RedirectResponse
    {
        $request->validated();

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['short_url'] = ShortUrl::generateShortUrl();

        $this->ShortUrlService->createShortUrl($data);

        return redirect(route('home'));
    }

    public function destroy($shortUrlId): RedirectResponse
    {
        $shortUrl = $this->ShortUrlService->getShortUrl($shortUrlId);

        Gate::authorize('delete', $shortUrl);

        $this->ShortUrlService->deleteShortUrl($shortUrl);

        return redirect(route('home'));
    }
}

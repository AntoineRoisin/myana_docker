@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit shortcut url') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="{{ route("shorturl.update", $shortUrl->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="Lien">URL</label>
                                    <input name="url" type="text" class="form-control" id="Lien" value="{{ $shortUrl->url }}">
                                </div>
                                <div class="form-group">
                                    <label for="Lien">URL</label>
                                    <input disabled type="text" class="form-control" id="Lien" value="{{ $shortUrl->short_url }}">
                                </div>

                                <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

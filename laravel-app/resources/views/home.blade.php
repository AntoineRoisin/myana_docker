@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <a class="btn btn-primary" href="{{ route('shorturl.create') }}">Créer un lien</a>
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Url short</th>
                                    <th scope="col">Date de validité</th>
                                    <th scope="col">Visite(s)</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($urls AS $url)
                                    <tr>
                                        <th scope="row">{{ $url->id }}</th>
                                        <td>{!! Str::limit($url->url, 30, ' ...') !!}</td>
                                        <td><span class="shortlink">/sl/{{ $url->short_url }}</span></td>
                                        <td>{{ $url->getValidityDate() }}</td>
                                        <td>{{ $url->visits }}</td>
                                        <td><a href="{{ route('shorturl.edit', $url) }}"><i class="fa-solid fa-pen-to-square"></i></a> <a href="{{ route('shorturl.destroyCustom', $url) }}"><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{ $urls->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        const span = document.querySelector("span.shortlink");

        span.onclick = function() {
            document.execCommand("copy");
        }

        span.addEventListener("copy", function(event) {
            event.preventDefault();
            if (event.clipboardData) {
                event.clipboardData.setData("text/plain", span.textContent);
            }
        });
    </script>
    <style>
        span.shortlink:hover {
            cursor: pointer;
        }
    </style>
@endsection

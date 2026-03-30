@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create shortcut url') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route("shorturl.store") }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Lien">URL à minifier</label>
                                        <input name="url" type="text" class="form-control" id="Lien" placeholder="Lien à raccourcir">
                                    </div>
                                    <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                            @if($errors->has('url'))
                                <ul>
                                    @foreach($errors->get('url') as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <h3>{{ $message }}</h3>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            <div class="card-columns">
                @foreach ($links as $link)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $link->title }}</h5>
                            <p class="card-text">{{ $link->description }}</p>
                            <p class="card-text"><small class="text-muted">{{ $link->category->name }}</small></p>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
@endsection

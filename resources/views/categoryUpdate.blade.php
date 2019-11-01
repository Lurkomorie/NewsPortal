@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h1 class="card-header text-center">{{ __('Edit a category') }}</h1>
                    <div class="card-body">
                        <form action={{ route('category.update', $category->id) }} method="POST">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    Please fix the following errors
                                </div>
                            @endif
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="title">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $category->name }}">
                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header text-center">{{ __('Edit a post') }}</h1>
                    <div class="card-body">
                        <form action={{ route('link.update', $link->id) }} method="POST">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    Please fix the following errors
                                </div>
                            @endif

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $link->title }}">
                                @if($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category_id">Category</label>
                                <select class="form-control" id="category_id" name="category_id" placeholder="Category" value="{{ $link->category_id }}">
                                    <option default value={{$link->category->id}}>{{$link->category->name}}</option>
                                    @foreach(\App\Category::all() as $category)
                                        @if($category->id != $link->category->id) <option value={{$category->id}}>{{$category->name}}</option>@endif
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <span class="help-block">{{ $errors }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description">{{ $link->description }}</textarea>
                                @if($errors->has('description'))
                                    <span class="help-block">{{ $errors->first('description') }}</span>
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

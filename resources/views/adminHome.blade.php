@extends('layouts.app')

@section('content')
    <div class="">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <h3>{{ $message }}</h3>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card ">
                    <h1 class="card-header">News list</h1>

                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    </tbody>
                    @foreach (\App\Link::all()->where('confirmed', true) as $u)
                        <tr>
                            <!-- Task Name -->
                            <td >
                                <div>{{ $u->id }}</div>
                            </td>

                            <td>
                                <div>{{ $u->title }}</div>
                            </td>
                            <td>
                                <div>{{ $u->category->name }}</div>
                            </td>
                            <td>
                                <div>{{ $u->description}}  <form action="{{ route('link.destroy',$u->id) }}" method="POST">
                                        <a href="{{ route('link.edit',$u->id) }}" class="btn ml-1 btn-sm btn-outline-success">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form></div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h1 class="card-header">Categories<a href="{{route('category.create')}}" class="btn brn ml-3 btn-outline-dark">Create new +</a></h1>

                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                    </tr>
                    </thead>
                    </tbody>
                    @foreach (\App\Category::all() as $u)
                        <tr>
                            <!-- Task Name -->
                            <td >
                                <div>{{ $u->id }}</div>
                            </td>

                            <td>
                                <div>{{ $u->name }}</div>
                            </td>

                            <td>
                                <div> {{ $u->description}}
                                    <div class="row">
                                        <a href="{{ route('category.edit',$u->id) }}" class="btn ml-1 btn-sm btn-outline-success">Edit</a>
                                        <form class="ml-1" action="{{ route('category.destroy',$u->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </div>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
                <div class="card text-white bg-danger">
                    <h1 class="card-header">Unconfirmed news</h1>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    </tbody>
                    @foreach (\App\Link::all()->where('confirmed', false) as $u)
                        <tr>
                            <!-- Task Name -->
                            <td >
                                <div>{{ $u->id }}</div>
                            </td>

                            <td>
                                <div>{{ $u->title }}</div>
                            </td>
                            <td>
                                <div>{{ $u->category->name }}</div>
                            </td>
                            <td>
                                <div> {{ $u->description}}
                                        <div class="row">
                                            <form action="{{ route('confirm',$u->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn ml-1 btn-sm btn-outline-success">Confirm</button>
                                            </form>
                                            <form class="ml-1" action="{{ route('link.destroy',$u->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </div>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

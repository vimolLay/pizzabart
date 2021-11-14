@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">My Drink</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View
                                Pizza</a>
                            <a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create
                                Pizza</a>
                            <a href="{{ route('drink.index') }}" class="list-group-item list-group-item-action">View
                                Drink</a>
                            <a href="{{ route('drink.create') }}" class="list-group-item list-group-item-action">Create
                                Drink</a>
                            <a href="{{ route('user.order') }}" class="list-group-item list-group-item-action">User
                                order</a>
                        </ul>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p> {{ $error }}
                                    <p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"> All Drinks
                        <a href="{{ route('drink.create') }}">
                            <button class="btn btn-success" style="float: right">Add drink</button>
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">S.Price</th>
                                    <th scope="col">M.Price</th>
                                    <th scope="col">L.Price</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>

                            </thead>
                            <tbody>
                                @if (count($drinks) > 0)

                                    @foreach ($drinks as $key => $drink)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td><img src="{{ Storage::url($drink->image) }}" width="80"></td>
                                            <td>{{ $drink->name }}</td>
                                            <td>{{ $drink->description }}</td>
                                            <td>{{ $drink->category }}</td>
                                            <td>{{ $drink->small_drink_price }}</td>
                                            <td>{{ $drink->medium_drink_price }}</td>
                                            <td>{{ $drink->large_drink_price }}</td>
                                            <td><a href="{{ route('drink.edit', $drink->id) }}"><button
                                                        class="btn btn-primary">Edit</button></a></td>
                                            <td><button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal{{ $drink->id }}">Delete</button></td>

                                            </button>
                                            </td>
                                            {{-- Modal bos delete --}}
                                            <div class="modal fade" id="exampleModal{{ $drink->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form action="{{ route('drink.destroy', $drink->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                    confirmation</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure baby?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </tr>
                                    @endforeach

                                @else
                                    <p> NO PIZZA TODAY</p>
                                @endif
                            </tbody>
                        </table>
                        {{ $drinks->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

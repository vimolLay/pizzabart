@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Menu</div>

                    <div class="card-body">
                        @if (Auth::check())
                            <form action="{{ route('order_drink.store') }}" method="post"> @csrf
                                <div class="form-group text-center">
                                    <p> Name: {{ auth()->user()->name }}</p>
                                    <p> Email: {{ auth()->user()->email }}</p>
                                    <p> Phone number: <input type="number" class="form-control" name="phone"></p>
                                    <p> Small drink order: <input type="number" class="form-control" name="small_drink"
                                            value="0"></p>
                                    <p> Medium drink order: <input type="number" class="form-control" name="medium_drink"
                                            value="0"></p>
                                    <p> Large drink order: <input type="number" class="form-control" name="large_drink"
                                            value="0"></p>

                                    <p> <input type="hidden" name="drink_id" value="{{ $drink->id }}"></p>
                                    <p> <input type="date" name="date" class="form-control" required> </p>
                                    <p> <input type="time" name="time" class="form-control" required></p>
                                    <p> <textarea name="body" class="form-control" required></textarea></p>

                                    <p class="text-center"> <button class="btn btn-danger" type="submit"> Make Order
                                        </button></p>

                                    @if (session('message'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('message') }} {{-- message ng in controller function store --}}
                                        </div>
                                    @endif

                                    @if (session('errmessage'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('errmessage') }} {{-- errmessage ng in controller function store --}}
                                        </div>
                                    @endif

                                </div>
                            </form>
                        @else
                            <p> <a href="/login">Please login to make order</a></p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Drink</div>

                    <div class="card-body">


                        <img src="{{ Storage::url($drink->image) }}" class="img-thumbnail" style="width:100%;">
                        <p>
                        <h3>{{ $drink->name }} </h3>
                        </p>

                        <p>Drink description : {{ $drink->description }}</p>
                        <p>
                            Small Drink Price: ${{ $drink->small_drink_price }}
                        </p>
                        <p>
                            Medium Drink Price: ${{ $drink->medium_drink_price }}
                        </p>
                        <p>
                            Large Drink Price : ${{ $drink->large_drink_price }}
                        </p>



                    </div>
                </div>
            </div>


        </div>
    </div>

    <style>
        a.list-group-item {
            font-size: 16px;
        }

        a.list-group-item:hover {
            background-color: red;
            color: #ffffff;
        }

        .card-header {
            background-color: red;
            color: #ffffff;
            font-size: 18px;
        }

    </style>
@endsection

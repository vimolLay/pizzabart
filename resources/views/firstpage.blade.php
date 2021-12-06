@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">My Drink</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <a href="{{ route('frontpage') }}" class="list-group-item list-group-item-action">Pizza
                            </a>
                            <a href="{{ route('frontpage_drink') }}"
                                class="list-group-item list-group-item-action">Drink</a>

                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">WELCOME HAHA </div>

                    <div class="card-body">
                        <div class="col-md-14">
                            <div class="card">
                                <div class="card-header"> ({{ count($drinks) }}) Drinks and ({{ count($pizzas) }})
                                    Pizzas
                                </div>

                                <div class="card-body">
                                    <div class="row">

                                        @forelse ($drinks as $drink)
                                            <div class="col-md-4 mt-2 text-center " style="border: 1px solid orange;">
                                                <img src="{{ Storage::url($drink->image) }}" class="img-thumbnail"
                                                    style="width:100%;">
                                                <p>{{ $drink->name }}</p>
                                                <p>{{ $drink->description }}</p>
                                                <a href="{{ route('drink.show', $drink->id) }}">
                                                    {{-- Name route ng yo pi web app name --}}
                                                    <button class="btn btn-danger mb-1">Order Now!</button>
                                                </a>
                                            </div>
                                        @empty
                                            <p> NO DRINK TODAY </p>
                                        @endforelse

                                        @forelse ($pizzas as $pizza)
                                            <div class="col-md-4 mt-2 text-center " style="border: 1px solid orange;">
                                                <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail"
                                                    style="width:100%;">
                                                <p>{{ $pizza->name }}</p>
                                                <p>{{ $pizza->description }}</p>
                                                <a href="{{ route('pizza.show', $pizza->id) }}">

                                                    <button class="btn btn-danger mb-1">Order Now!</button>
                                                </a>
                                            </div>
                                        @empty
                                            <p> NO PIZZA </p>
                                        @endforelse


                                    </div>


                                </div>
                            </div>
                        </div>
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
            background-color: rgb(33, 194, 235);
            color: #ffffff;
        }

        .card-header {
            background-color: rgb(33, 194, 235);
            color: #ffffff;
            font-size: 18px;
        }

    </style>
@endsection

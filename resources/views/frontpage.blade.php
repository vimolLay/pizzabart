@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Menu</div>

                    <div class="card-body">

                        <form action="{{ route('frontpage') }}" method="get">
                            <a href="/" class="list-group-item list-group-item-action"> back </a>
                            <input type="submit" class="list-group-item list-group-item-action" value="Vegetarian"
                                name="category">
                            <input type="submit" class="list-group-item list-group-item-action" value="Nonvegetarian"
                                name="category">
                            <input type="submit" class="list-group-item list-group-item-action" value="Tradition"
                                name="category">


                        </form>


                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">({{ count($pizzas) }}) Pizzas
                    </div>

                    <div class="card-body">
                        <div class="row">
                            @forelse ($pizzas as $pizza)
                                <div class="col-md-4 mt-2 text-center " style="border: 1px solid #ccc;">
                                    <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail"
                                        style="width:100%;">
                                    <p>{{ $pizza->name }}</p>
                                    <p>{{ $pizza->description }}</p>
                                    <a href="{{ route('pizza.show', $pizza->id) }}"> {{-- Name route ng yo pi web app name --}}
                                        <button class="btn btn-danger mb-1">Order Now!</button>
                                    </a>
                                </div>
                            @empty
                                <p> No Pizza Today</p>

                            @endforelse


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

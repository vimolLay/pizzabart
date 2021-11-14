@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Menu</div>

                    <div class="card-body">

                        <form action="{{ route('frontpage_drink') }}" method="get">
                            <a href="/" class="list-group-item list-group-item-action"> back </a>
                            <input type="submit" class="list-group-item list-group-item-action" value="Alcoholic"
                                name="category">

                            <input type="submit" class="list-group-item list-group-item-action" value="Coffee"
                                name="category">

                            <input type="submit" class="list-group-item list-group-item-action" value="Drinking Water"
                                name="category">

                            <input type="submit" class="list-group-item list-group-item-action" value="Energy Drink"
                                name="category">

                            <input type="submit" class="list-group-item list-group-item-action" value="Juice"
                                name="category">

                            <input type="submit" class="list-group-item list-group-item-action" value="Soft drink"
                                name="category">
                            <input type="submit" class="list-group-item list-group-item-action" value="Tea" name="category">


                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> ({{ count($drinks) }}) Drinks
                    </div>

                    <div class="card-body">
                        <div class="row">
                            @forelse ($drinks as $drink)
                                <div class="col-md-4 mt-2 text-center " style="border: 1px solid #ccc;">
                                    <img src="{{ Storage::url($drink->image) }}" class="img-thumbnail"
                                        style="width:100%;">
                                    <p>{{ $drink->name }}</p>
                                    <p>{{ $drink->description }}</p>
                                    <a href="{{ route('drink.show', $drink->id) }}"> {{-- Name route ng yo pi web app name --}}
                                        <button class="btn btn-danger mb-1">Order Now!</button>
                                    </a>
                                </div>
                            @empty
                                <p> NO DRINK TODAY </p>
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

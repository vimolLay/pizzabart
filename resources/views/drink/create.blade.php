@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">My Drink</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <a href="{{ route('drink.index') }}" class="list-group-item list-group-item-action"> View Drink
                            </a>
                            <a href="{{ route('drink.create') }}" class="list-group-item list-group-item-action">Create
                                Drink
                            </a>
                            <a href="" class="list-group-item list-group-item-action"> User Order
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">My Drink</div>

                    <form action="{{ route('drink.store') }}" method="post" enctype="multipart/form-data"> @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name"> Name of the drink</label>
                                <input type="text" class="form-control" name="name" placeholder="Name of the drinks">
                            </div>
                            <div class="form-group">
                                <label for="description"> Description of the drink</label>
                                <textarea type="text" class="form-control" name="description"> </textarea>
                            </div>
                            <div class="form-inline">
                                <label for="price"> Price ($) </label>
                                <input name="small_drink_price" type="number" class="form-control"
                                    placeholder="small drink price">
                                <input name="medium_drink_price" type="number" class="form-control"
                                    placeholder="medium drink price">
                                <input name="large_drink_price" type="number" class="form-control"
                                    placeholder="large drink price">
                            </div>
                            <div class="form-group">
                                <label for="description">Category</label>
                                <select class="form-control" name="category">
                                    <option value=""></option>
                                    <option value="Protein_drink">Protein Drink</option>
                                    <option value="drinking_water">Drinking Water</option>
                                    <option value="soft_drink">Soft Drink</option>
                                    <option value="coffee">Coffee</option>
                                    <option value="juice">Juice</option>
                                    <option value="alcoholic">Alcoholic</option>
                                    <option value="tea">Tea</option>
                                    <option value="energy_drink">Energy Drink</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>


                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

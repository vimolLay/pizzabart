@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-10">

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

                <div class="card">
                    <div class="card-header">Edit Drink</div>

                    <form action="{{ route('drink.update', $drink->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name"> Name of the drink</label>
                                <input type="text" class="form-control" name="name" value="{{ $drink->name }}"
                                    placeholder="Name of the drinks">
                            </div>
                            <div class="form-group">
                                <label for="description"> Description of the drink</label>
                                <textarea type="text" class="form-control"
                                    name="description"> {{ $drink->description }} </textarea>
                            </div>
                            <div class="form-inline">
                                <label for="price"> Price ($) </label>
                                <input name="small_drink_price" type="text" class="form-control"
                                    placeholder="small drink price" value="{{ $drink->small_drink_price }}">
                                <input name="medium_drink_price" type="text" class="form-control"
                                    placeholder="medium drink price" value="{{ $drink->medium_drink_price }}">
                                <input name=" large_drink_price" type="text" class="form-control"
                                    placeholder="large drink price" value="{{ $drink->large_drink_price }}">
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
                                <img src="{{ Storage::url($drink->image) }}" width="80">
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

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-14">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"> Order </li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header"> order

                        <a style="float:right;" href="{{ route('pizza.index') }}"><button class="bnt btn-secondary btn-sm"
                                style="margin-left: 5px;">View Pizza</button></a>
                        <a style="float:right;" href="{{ route('pizza.create') }}"><button
                                class="bnt btn-secondary btn-sm">Add new Pizza</button></a>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">Phone/Email</th>
                                    <th scope="col">Date/Time</th>
                                    <th scope="col">Pizza</th>
                                    <th scope="col">Small size</th>
                                    <th scope="col">Medium size</th>
                                    <th scope="col">Large size</th>
                                    <th scope="col">Total($)</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Accept</th>
                                    <th scope="col">Reject</th>
                                    <th scope="col">Completed</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>

                                        <td>{{ $order->user->name }} </td>
                                        <td>{{ $order->user->email }} <br> {{ $order->phone }}</td>
                                        <td>{{ $order->date }}/{{ $order->time }}</td>
                                        <td>{{ $order->pizza->name }} </td>
                                        <td>{{ $order->small_pizza }} </td>
                                        <td>{{ $order->medium_pizza }}</td>
                                        <td>{{ $order->large_pizza }}</td>
                                        <td>
                                            ${{ $order->pizza->small_pizza_price * $order->small_pizza + $order->pizza->medium_pizza_price * $order->medium_pizza + $order->pizza->large_pizza_price * $order->large_pizza }}

                                        </td>
                                        <td>{{ $order->body }}</td>
                                        <td>{{ $order->status }}</td>

                                        <form action="{{ route('order.status', $order->id) }}" method="post"> @csrf
                                            <td>
                                                <input name="status" type="submit" value="accepted"
                                                    class="btn btn-primary btn-sm">
                                            </td>
                                            <td>
                                                <input name="status" type="submit" value="rejected"
                                                    class="btn btn-danger btn-sm">
                                            </td>
                                            <td>
                                                <input name="status" type="submit" value="completed"
                                                    class="btn btn-success btn-sm">
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">Phone/Email</th>
                                    <th scope="col">Date/Time</th>
                                    <th scope="col">Drink</th>
                                    <th scope="col">Small size</th>
                                    <th scope="col">Medium size</th>
                                    <th scope="col">Large size</th>
                                    <th scope="col">Total($)</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Accept</th>
                                    <th scope="col">Reject</th>
                                    <th scope="col">Completed</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders_drink as $order_drink)
                                    <tr>

                                        <td>{{ $order_drink->user->name }} </td>
                                        <td>{{ $order_drink->user->email }} <br> {{ $order_drink->phone }}</td>
                                        <td>{{ $order_drink->date }}/{{ $order_drink->time }}</td>
                                        <td>{{ $order_drink->drink->name }} </td>
                                        <td>{{ $order_drink->small_drink }} </td>
                                        <td>{{ $order_drink->medium_drink }}</td>
                                        <td>{{ $order_drink->large_drink }}</td>
                                        <td>
                                            ${{ $order_drink->drink->small_drink_price * $order_drink->small_drink + $order_drink->drink->medium_drink_price * $order_drink->medium_drink + $order_drink->drink->large_drink_price * $order_drink->large_drink }}

                                        </td>
                                        <td>{{ $order_drink->body }}</td>
                                        <td>{{ $order_drink->status }}</td>

                                        <form action="{{ route('order_drink.status', $order_drink->id) }}" method="post">
                                            @csrf
                                            <td>
                                                <input name="status" type="submit" value="accepted"
                                                    class="btn btn-primary btn-sm">
                                            </td>
                                            <td>
                                                <input name="status" type="submit" value="rejected"
                                                    class="btn btn-danger btn-sm">
                                            </td>
                                            <td>
                                                <input name="status" type="submit" value="completed"
                                                    class="btn btn-success btn-sm">
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>


                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

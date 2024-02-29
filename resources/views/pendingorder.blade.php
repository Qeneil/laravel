@extends('layouts.Dashboard')
@section('content')
<div class="container my-5">
    <div class="card p-4">
        <div class="card-title"> 
            <h2 class="text-center">Pending Order </h2>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>user id</th>
                    <th>shipping information</th>
                    <th>product id</th>
                    <th>Quantity</th>
                    <th>total will pay</th>
                    <th>Action</th>
                </tr>
                @foreach ($pending_order as $order)
                <tr>
                    <td>{{ $order->userid }}</td>
                    <td><ul> 
                        <li>Phone Number ->{{ $order->shipping_phonenumber }}</li>
                        <li>City ->{{ $order->shipping_city }} </li>
                        <li>Postal code ->{{ $order->shipping_postalcode }}</li>
                        </ul>
                    </td>
                    <td>{{ $order->product_id }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td><a href="" class="btn btn-success">Approve Now</a></td>
                    <td>{{-- Your action here --}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

@section('page_title')
Pending-Ecom
@endsection

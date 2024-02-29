@extends('user.layouts.userprofile')
@section('profilecontent')
pending order
<table class="table"> 
    <tr>
        <th>Product Id</th>
        <th> Price</th>
    </tr>
    @foreach ($pending_order as $order )
    <tr>
        <td>{{ $order -> product_id }}</td>
        <td>{{ $order -> total_price }}</td>
    </tr>
    @endforeach
</table>
@endsection
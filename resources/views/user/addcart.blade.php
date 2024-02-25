@php
$categories = App\Models\Category::latest()->get();
@endphp
@extends('user.layouts.template')
@section('main-content')   
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif 

<div class="row">
  <div class="col-12"> 
    <div class="box_main"> 
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Product image</th>

              <th>Product Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            @foreach ($cart_item as $item )
            <tr>
              @php
$product_name = App\Models\Product::where('id',$item ->product_id)->value('product_name');
$img = App\Models\Product::where('id',$item ->product_id)->value('product_img');

@endphp
<td><img src="{{ asset($img) }}" style="height: 100px;"></td>
              <td>{{ $product_name }}</td>
              <td>{{ $item ->quantity }}</td>
              <td>{{ $item ->price }}</td>
              <td><a href="" class="btn btn-warning"> remove</a></td>
              
            @endforeach
          </thead>
          <tbody>
            {{-- Your table rows will go here --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

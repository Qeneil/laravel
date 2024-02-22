@extends('layouts.Dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> All Product</h4><div class="card">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            
                <h5 class="card-header">Available  All Product information </h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Img</th>
                        <th>Price</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($products as $product)
                        
                      <tr>
                        <td>{{ $product -> id }}</td>
                        <td>{{ $product -> product_name }}</td>
                        <td><img style="height: 100px;" src="{{ asset($product -> product_img) }}"alt"">
                        <br>
                        <a href="{{ route('editproductimage', $product->id) }}" class="btn btn-primary">Update Image</a>
                        </td>
                        <td>{{ $product -> price}}</td>
                        <td>
                            <a href="{{ route('editproduct' , $product -> id) }}" class="btn btn-primary">edit</a>
                            <a href="" class="btn btn-warning">delete</a>

                        </td>
                      </tr>
                     
                       
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
</div>
@section('page_title')
AllProuct-Ecom
@endsection
all pro
@endsection
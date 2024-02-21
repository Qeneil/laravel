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
                      <tr>
                        <td>1</td>
                        <td>Fan</td>
                        <td></td>
                        <td>100</td>
                        <td>
                            <a href="" class="btn btn-primary">edit</a>
                            <a href="" class="btn btn-warning">delete</a>

                        </td>
                      </tr>
                     
                       
      
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
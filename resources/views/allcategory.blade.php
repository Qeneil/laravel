@extends('layouts.Dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> All Category</h4>
    <div class="card">
        <h5 class="card-header">Available Category information </h5>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Id</th> 
                        <th>Category Name</th>
                        <th>Sub category</th>
                        <th>Product</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>1</td>
                        <td>Electronics</td>
                        <td>10</td>
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
@endsection

@section('page_title')
AllCategory-Ecom
@endsection

@extends('layouts.Dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> All Sub Category</h4><div class="card">
                <h5 class="card-header">Available  All   Sub Category information </h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Id</th>
                        <th>Sub Category Name</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($allsubcategories as $subcategory )
                        
                      @endforeach
                      <tr>
                        <td>{{$subcategory ->id }}</td>
                        <td>{{$subcategory ->subcategory_name }}</td>
                        <td>{{$subcategory ->category_name }}</td>
                        <td>{{$subcategory ->product_count }}</td>
                        <td>
                            <a href="{{ route('editsubcategory',$subcategory ->id) }}" class="btn btn-primary">edit</a>
                            <a href="{{ route('deletesubcategory',$subcategory ->id   ) }}" class="btn btn-warning">delete</a>

                        </td>
                      </tr>
                     
                       
      
                    </tbody>
                  </table>
                </div>
              </div>
</div>
@section('page_title')
AllSubCategory-Ecom
@endsection
all sub
@endsection
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
     c
              <th>Quantity</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            @php
              $total =0;
            @endphp
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
              <td><a href="{{ route('deletecart' , $item->id) }}" class="btn btn-warning"> remove</a></td>
            </tr>
            @php
              $total = $total + $item ->price;
            @endphp
                        @endforeach
                        @if ($total >0)
                        <tr> 
                          <td></td>
                          <td></td>
                          <td class="text-center" >Total</td>
                        <td class="text-center">{{ $total }}</td>
<td><a href="{{ route('getshipping') }}" class="btn btn-primary">check out </a></td>


          
          </tr>
          @endif

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

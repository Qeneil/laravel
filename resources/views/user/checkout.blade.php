@extends('user.layouts.template')
@section('main-content')   
<div class="row">
    <div class="col-8">
        <div class="box_main">
            Product will sendt
            <p> City/vilage -> {{  $shipping_address ->city_name }}</p>
            <p> postal code -> {{  $shipping_address ->postal_code }}</p>
            <p> PhoneNumber -> {{  $shipping_address ->phone_number }}</p>

        </div>
    </div>
    <div class="col-4">
        <div class="box_main">
            your final product
       
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
              
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                          </tr>
                          @php
                            $total =0;
                          @endphp
                          @foreach ($cart_item as $item )
                          <tr>
                            @php
              $product_name = App\Models\Product::where('id',$item ->product_id)->value('product_name');              
              @endphp
                            <td>{{ $product_name }}</td>
                            <td>{{ $item ->quantity }}</td>
                            <td>{{ $item ->price }}</td>
                          </tr>
                          @php
                            $total = $total + $item ->price;
                          @endphp
                                      @endforeach
                                      <tr> 
                                        <td></td>
                                        <td class="text-center" >Total</td>
                                      <td class="text-center">{{ $total }}</td>
              
              
                        
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
    
    <form action="" method="POST">
        @csrf
        <input type="submit" value="Cancle Order " class="btn btn-danger mr-3">
    </form>
    <form action="{{ route('placeproduct') }}" method="POST">
        @csrf
        <input type="submit" value="Place Order " class="btn btn-primary mr-3">
    </form>
</div>


@endsection
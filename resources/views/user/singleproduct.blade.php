@extends('user.layouts.template')
@section('main-content')   
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <div class="tshirt_img"><img src="{{ asset($product -> product_img) }}"></div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box_main">
                <div class="product-info">
                    <h4 class="shirt_text text-left">{{ $product ->product_name }}</h4>
                    <p class="price_text text-left">{{ $product ->price }} <span style="color: #262626;">$</span></p>
                </div>
                <p class="lead"> {{ $product->product_long_des }} </p>
               <ul class="p-2 bg-light my-2"> 
                <li>Category :{{ $product->product_category_name }}</li>
                <li>Subcategory :{{ $product->product_subcatgory_name }}</li>
                <li>Quarntity :{{ $product->quantity }}</li>
               </ul>
               <div class="btn_main">

                <form action="{{ route('addproducttocart',$product->id ) }}" method="POST"></form>
                @csrf
                <input type="hidden" value=" {{ $product->id }}" name="prouct_id">
<div class="form-group">
<label for="prouct_quantity">How many pics?</label>
                <input class="form-control" type="number" min='1' placeholder="1" name="product_quantity" >
            </div>
                <br>
               </div>
                <input class="btn btn-warning" type="submit" value="Add To Cart">
            </form>
               </div>

            </div>
        </div>
    </div>
</div>
<div class="fashion_section">
    <div id="main_slider">
             <div class="container">
                <h1 class="fashion_taital">Related Product</h1>
                <div class="fashion_section_2">
                   <div class="row">
                    @foreach ($related_products as $product )
                              
                    <div class="col-lg-4 col-sm-4">
                       <div class="box_main">
                          <h4 class="shirt_text">{{ $product ->product_name }}</h4>
                          <p class="price_text">Price  <span style="color: #262626;">{{ $product ->price }}</span></p>
                          <div class="tshirt_img"><img src="{{ asset($product ->product_img) }}"></div>
                          <div class="btn_main">
                             <div class="buy_bt">   
                                <form action="{{ route('addproducttocart',$product->id ) }}" method="POST">
                                @csrf
                                <input type="hidden" value=" {{ $product->id }}" name="prouct_id">
               
                                <br>
                                <input class="btn btn-warning" type="submit" value="Buy NOW">
                            </form>
                            
                          </div>
                             <div class="seemore_bt">
                                <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">See More</a>
                            </div>
                                                      
                    
                          </div>
                       </div>
                    </div>
                    @endforeach

                   </div>
                </div>
             </div>
          </div>
     
       
    </div>
 </div>
</div>
@endsection
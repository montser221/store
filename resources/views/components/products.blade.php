<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-6 col-lg-3">
            <a href="{{route('shop.show',$product->slug)}}"> 
                <img class=" product-img rounded float-start mt-3 d-block img-thumbnail" 
                src="{{ asset("images/products/". random_int(1,5) .".jpg")}}" alt="product image"/> </a>
            <a class="product-name text-center" href="{{route('shop.show',$product->slug)}}"> <div  >{{$product->name}} </div> </a>
            <div class="product-price text-center">$ {{$product->presentPrice()}} </div>
        </div>
        @endforeach            
    </div>
</div>
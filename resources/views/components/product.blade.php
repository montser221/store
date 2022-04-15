<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
       
            @if (!empty($product->image))
                <img    class="product-img-detail rounded float-start mt-3 d-block img-thumbnail" 
                src="{{asset('storage/'.$product->image)}}" 
                alt="" 
                srcset="">                
            @else
                <img class=" product-img-detail rounded float-start mt-3 d-block img-thumbnail" 
                src="{{asset("images/products/". random_int(1,5) .".jpg")}}" alt="product image"/> 
            @endif
        </div>
        <div class="col-md-6">
            <h3 class="bolder"> {{$product->slug}}  </h3>
             <div class="text-bold" >{{$product->details}} </div> 
            <div class="bolder mb-4" > <strong> $ {{$product->price}}  </strong>  </div>
            <p>{{$product->description}}</p>
            <input 
            type="number" 
            min="1" 
            max="5" 
            name="quantity" 
            class="form-control"  
            value="1" 
            id="quantity"
            style="width: 20%">
            <div class="mt-4">
                <form action="{{route('cart.store')}}" method="POST" class="">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id}}">
                    <input type="hidden" name="name" value="{{ $product->name}}">
                    <input type="hidden" name="slug" value="{{ $product->slug}}">
                    <input type="hidden" name="price" value="{{ $product->price}}">
                    <input type="hidden" id="qty" name="qty" value="1">
                    <input type="hidden" name="description" value="{{ $product->description}}">
                    <input type="hidden" name="details" value="{{ $product->details}}">
                    <input id="addtocard" type="submit" class="btn btn-success"  value="Add To Cart">
                </form>
            </div>
        </div> 
        <div class="col">
       {{$slot}}
       </div>
    </div>
</div>

<div class="container mt-4 mb-4">
    <div class="row ">
        <div class="col">
                       
            @include('includes.success')
            @include('includes.error')            
            @if (session()->has('errors'))
                <div class="alert-danger alert">
                    {{session()->get('errors')}}
                </div>
            @endif
            @if (ShoppingCart::isEmpty())
                <h4 class="mb-4 mt-4"> No Items In  Cart</h4>
                <a href="{{route('shop.index')}}" class="btn btn-success btn-sm">Go Back To Shop</a>
            @else
            <div class="d-flex" style="width: 78%;justify-content: space-between;">
                <h4> <span id="countRows"> {{ShoppingCart::count()}} </span>Item(s) in cart</h4> 
                <h4 class="right"> <a id="clearallcart" href="{{route('cart.clear')}}" class="btn btn-danger">Clear Cart</a> </h4>
            </div>
            @endif
            @foreach (ShoppingCart::all() as $item)
            <hr>
            <div class="row justify-content-start">
                <div class="col-md-4 d-flex ">
                    <a href="{{route('shop.show',$item->slug)}}">
                        <img class="cart-image " src="{{asset('images/products/1.jpg')}}" alt="">
                    </a>
                    <ul class="list-unstyled">
                        <li class="list-item"> {{$item->name}} </li>
                        <li class="list-item"> {{$item->details}} </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="list-unstyled">
                        <li class="list-item"> 
                            <form action="{{route('cart.destroy',$item->rawId())}}" method="POST">
                                    @csrf
                                    
                                <input id="removeFromCartBtn" class="btn btn-danger" type="submit" value="Remove">
                            </form> 
                        </li>
                        <li class="list-item"> 
                            <form action="{{route('cart.saveforlater',$item->rawId())}}" method="POST">
                                @csrf
                                <input class="my-auto" type="submit" value="save for later">
                            </form>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <ul class="list-unstyled d-flex">
                        <li class="list-item"> 
                            <input style="width: 34px;margin-right: 65px;" 
                            data-id="{{$item->rawId()}}"
                            class="quantity"
                            {{-- name="quantity" --}}
                            type="number" 
                            value="{{$item->qty}}" 
                            min="1" 
                            max="6" 
                            id=""> 
                        </li>
                        <li class="list-item cart-price"> $ {{presentPrice($item->price)}} </li>
                    </ul>
                </div>
            </div>
            @endforeach  
        </div>
        
    </div>
    @if (ShoppingCart::isEmpty())

    @else
    <div class="row mt-5 mb-5">
        <div class="col-sm-6">
           {{$item->description ?? ''}}
        </div>
        <div class="col-sm-6">
            <ul class="list-unstyled">
                <li class="list-item">
                    Quantity :  <strong>{{ $item->qty }}</strong>
                </li>
                {{-- <li class="list-item">
                    Tax :  $504
                </li> --}}
                <li class="list-item bolder">
                    Total :  <strong id="totalItems">{{  presentPrice(ShoppingCart::total()) }}</strong>
                </li>
            </ul>
            
        </div>
        <div class="col-sm-6 mt-4">
            <div > <a class="btn btn-success" href="{{route('shop.index')}}">Continue Shopping</a></div>
        </div>
        
        <div class="col-sm-6 mt-4">
            <div > <a class="btn btn-success" href="{{route('checkout.index')}}">Proceed to Checkout</a></div>
        </div>
    </div>
    @endif
   <br>
    <form action="{{route('cart.saveditems')}}" method="POST">
        @csrf
        <input class="my-auto btn btn-warning" type="submit" value="saved items">
    </form>
   <br>

    <form action="{{route('cart.clearfromsavedlater')}}" method="POST">
        @csrf
        <input class="my-auto btn btn-warning" type="submit" value="Remove From Saved items">
    </form>

    <div class="save-to-later">
        <h4>Save To Later</h4>
        @foreach (ShoppingCart::all() as $item)
        <hr>
        <div class="row justify-content-start">
            <div class="col-md-4 d-flex ">
                <a href="{{route('shop.show',$item->slug)}}">
                    <img class="cart-image " src="{{asset('images/products/1.jpg')}}" alt="">
                </a>
                <ul class="list-unstyled">
                    <li class="list-item"> {{$item->name}} </li>
                    <li class="list-item"> {{$item->details}} </li>
                </ul>
            </div>
            {{-- {{dd(ShoppingCart::all())}} --}}
            <div class="col-md-3">
                <ul class="list-unstyled">
                    <li class="list-item"> 
                        <form action="{{route('cart.destroy',$item->rawId())}}" method="POST">
                                @csrf
                                
                            <input id="removeBtn" class="btn btn-danger" type="submit" value="Remove">
                        </form> 
                    </li>
                    <li class="list-item"> <a href="#">save for later</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <ul class="list-unstyled d-flex">
                    <li class="list-item"> 
                        <input style="width: 34px;margin-right: 65px;" 
                        type="number" value="{{$item->gty ?? 1}}" name="qty" min="1" max="5" id=""> </li>
                    <li class="list-item cart-price"> $ {{number_format($item->price,2)}} </li>
                </ul>
            </div>
        </div>
        @endforeach  
    </div>

    <x-might-also-like slug="{{$item->slug ?? ''}}">

    </x-might-also-like>
    @push('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript">
        
        
        (function(){
            const classname = document.querySelectorAll(".quantity");
            // const __alert = document.querySelector(".alert");

            // function fade(element) 
            // {
            //     var op = 1;  // initial opacity
            //     var timer = setInterval(function () {
            //         if (op <= 0.1){
            //             clearInterval(timer);
            //             element.style.display = 'none';
            //         }
            //         element.style.opacity = op;
            //         element.style.filter = 'alpha(opacity=' + op * 100 + ")";
            //         op -= op * 0.1;
            //     }, 500);
            // }

            // if(__alert) 
            // {
            //     fade(__alert)  
            //     // console.log(__alert);
            // }
            
            Array.from(classname).forEach(function(element){
                element.addEventListener('change',function(){
                    // alert("work fine");
                    let id = element.getAttribute('data-id');

                    axios.patch(`/cart/update/${id}`,
                    {
                        quantity:this.value,
                    }
                    )
                    .then(function (response) {
                        // handle success

                        window.location.href ='{{ route('cart.index') }}', 
                        console.log(response.data);
                        
                    })
                    .catch(function (error,e) {
                        // handle error
                        window.location.href ='{{ route('cart.index') }}';
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                        
                    });

                });
            });

         })();
    </script>
@endpush    
</div>

<!-- Start container -->
<div class="container">
    <h4 class=" my-3 h2">Checkout </h4>
    <!-- Start row -->
    <div class="row">
        {{-- errors  --}}
        @include('includes.success')
        {{-- @include('includes.errors') --}}
        @include('includes.error')

        {{-- start billing details --}}
        <div class="col-md-6">
            <div class="h2 bolder">Billing Details</div>
            <!-- start form -->           
                <form id="payment-form" action="https://api.moyasar.com/v1/payments.html" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Email Address</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <div>
                            <label for="" class="form-label">City</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                        <div>
                            <label for="" class="form-label">Province</label>
                            <input type="text" class="form-control" name="province">
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <div>
                            <label for="" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" name="postalcode">
                        </div>
                        <div>
                            <label for="" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div>
                    
                    <div class="mb-3 my-3">
                        <h4 class="h2">Payment Details</h4>
                    </div>
                    <input type="hidden" name="callback_url" value="{{route("moyasar.index")}}">
                    <input type="hidden" name="publishable_api_key" value="{{env('MOYASAR_API_PUBLISHABLE_KEY')}}">
                    <input type="hidden" name="source[type]" value="creditcard" />
                    <div class="mb-3">
                        <label for="" class="form-label">Name On Card</label>
                        <input type="text" class="form-control" name="source[name]" autocomplete>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Card Information</label>
                        <input type="text" class="form-control" autocomplete name="source[number]">
                    </div>
                    <div class="mb-3 my-3 d-flex justify-content-between">
                        <div>
                            <label for="" class="form-label">Expire</label>
                            <div class="d-flex">
                                <input style="width: 80px" autocomplete class="form-control"  type="text" name="source[month]" placeholder="MM" >
                                <input style="width: 80px"autocomplete  class="form-control"  type="text" name="source[year]" placeholder="YY" >
                            </div>
                        </div>
                        <div>
                            <label for="" class="form-label">CVC Code</label>
                            <input type="text" class="form-control" name="source[cvc]" autocomplete>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Amount</label>
                        <input type="number" class="form-control" value="{{ $subtotal }}" name="amount">
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <input type="submit" value="Complete Order" class="btn btn-primary btn-lg ">
                    </div>
                </form>
                <!-- end form -->
            </div>
        {{-- end billing details --}}

        {{-- start your order --}}
        <div class="col-md-6">
            <div class="h2 bolder">Your Order</div>
            @foreach (ShoppingCart::all() as $item)
            <hr>
            <div class="row justify-content-start">
                <div class="col-md-12 d-flex ">
                    <a href="{{route('shop.show',$item->slug)}}">
                        <img class="cart-image " src="{{asset('images/products/1.jpg')}}" alt="">
                    </a>
                    <ul class="list-unstyled">
                        <li class="list-item"> {{$item->name}} </li>
                        <li class="list-item"> {{$item->details}} </li>
                        <li class="list-item cart-price"> $ {{presentPrice($item->price)}} </li>
                    </ul>
                    <ul class="list-unstyled d-flex">
                        <li class="list-item"> 
                            <input style="width: 34px;margin-left: 20px;" 
                            type="number" value="{{$item->qty}}" min="1" max="5" id=""> </li>
                     
                    </ul>
                </div>
            </div>
            @endforeach  
            <hr>
            @if (ShoppingCart::isEmpty())

            @else
           
            <div class="row mt-5 mb-5">
                
                <div class="col">
                    
                    <ul class="list-unstyled">
                        
                        @if(session()->has('coupun'))
                        <li class="list-item d-flex justfiy-content-between">
                            <div class="w-50"> Subtotal </div>  <strong>{{ presentPrice($subtotal) }}</strong>
                        </li>
                        <li class="list-item d-flex justfiy-content-between">
                            <div class="w-50">Discount({{session()->get('coupun')['name']}}) 
                                <form class="d-inline" action="{{route('coupun.destroy')}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn text-danger" style="font-size: 14px" type="submit">Remove</button>
                                </form>
                            </div>
                            
                            <div> -${{ presentPrice($discount)}}</div>
                            
                        </li>
                        @else
                        <li class="list-item d-flex justfiy-content-between">
                            <div class="w-50"> Subtotal </div>  <strong>{{ presentPrice(00) }}</strong>
                        </li>
                            <li class="list-item d-flex justfiy-content-between">
                                <div class="w-50"> Discount(none)</div>
                                 <div>-${{ presentPrice(00)}}</div>
                            </li>
                        @endif

                        <li class="list-item bolder d-flex justfiy-content-between">
                            <div class="w-50"> Total </div>
                             <strong id="totalAmount">{{  presentPrice(ShoppingCart::total()) }}</strong>
                        </li>
                    </ul>
                    <hr>
                    {{-- start coupun --}}
                    @if(!session()->has('coupun'))
                    <div class="copun">
                        <h4 class="fs-5 text-black-50">Have A Copun?</h4>
                        <div class="copun-input p-3  rounded">
                            <form 
                                class="form-copun d-flex justfiy-content-between" 
                                action="{{route('coupun.store')}}"
                                method="POST"
                                >
                                @csrf
                                <input id="coupun"  data-coupun="this.value" class="form-control" type="text"  name="coupun">
                                <input id="apply" type="submit" value="Apply" class="btn custom-border " >
                            </form>
                        </div>
                    </div>  
                    @endif
                    {{-- end coupun   --}}
                </div>
                
                
            </div>
            @endif
           
        </div>
        {{-- end your order --}}
    
    </div>
    <!-- end row -->
    @push('scripts')
        <script src="{{asset('js/app.js')}}"></script>
        <script type="text/javascript">

        /*
        (function(){
           
        let formCopun = document.querySelector('.form-copun');
        let coupun = document.getElementById('coupun');
            // console.log(formCopun);
            if (formCopun) {
                formCopun.addEventListener('submit',applyCoupun);
            }
            
            function applyCoupun(e)
            {
                e.preventDefault();
            
                let url ='{{route("coupun.store")}}';
           
            axios.post(url,{
                coupun:coupun.value
            })
            .then(function (response) {
                console.log(response.data);
                window.location.href = '{{route('checkout.index')}}';
            })
            .catch(function (error) {
                console.log(error);
            });
        }
        

        })();
    */
        </script>
    @endpush    
</div>
<!-- Start container -->

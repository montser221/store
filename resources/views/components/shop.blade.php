<div class="container">
    <div class="row mt-4">
        <div class="col-sm-3">
            <h4 class="h5">By Category</h4>
            <ul class="list-unstyled">
                @foreach ($categories as $cat)
                <li class="list-item {{setActiveCAtegory($cat->slug,'fw-bold')}}"> 
                    <a  class="link-normal line-hight "  href="{{route('shop.index',['category'=>$cat->slug])}}"> {{$cat->category_name}}
                    </a>
                </li>
                @endforeach
            </ul>

        </div>

        <div class="col-sm-9">
            <div class="d-flex " style="justify-content: space-between">
                <h4 class="h2 bolder">{{$categoryName}}</h4>
                <div>
                    <strong>By Price:</strong>
                    <a  href="{{route('shop.index',['category'=>request()->category,'sort'=>'low_high'])}}" 
                        style="text-decoration:none;color:#666">Low To High</a> | <a href="{{route('shop.index',['category'=>request()->category,'sort'=>'high_low'])}}" style="text-decoration:none;color:#666">High To Low</a>
                </div>
            </div>
            
            <div class="row">
            @forelse($products as $product)
                <div class="col-sm-4">
                    <a href="{{route('shop.show',$product->slug)}}"> 
                        <img class=" product-img rounded float-start mt-3 d-block img-thumbnail" 
                        src="{{ asset("images/products/". random_int(1,5) .".jpg")}}" alt="product image"/> </a>
                    <a class="product-name text-center" href="{{route('shop.show',$product->slug)}}"> <div  >{{$product->name}} </div> </a>
                    <div class="product-price text-center">$ {{$product->presentPrice()}} </div>
                </div>
            @empty
            <div class="">
                No Items Found
            </div>
            @endforelse
            </div>
            
            {{$products->appends(request()->input())->links()}}
        </div>

    </div>
</div>
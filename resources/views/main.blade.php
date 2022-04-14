<x-layout>
    @section('title','Home Page ')

    <x-header>

    </x-header>

    <div class="container text-center m-4">
        <div class="row justfiy-content-center">
            <div class="col-md-4"></div>
            <div class="padding-left pl-4 col-md-6 ">
                <h3 class="bolder">Mis Store E-commerce</h3>
                <p class="">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quae dolore ipsa rem excepturi aliquid
                    minima eius culpa cum ex aut repellat,
                    blanditiis, soluta nostrum aspernatur quasi neque saepe eum quia?
                </p>
            </div>
        </div>
    </div>
    <div class=" container m-4">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-4">
                <div class="tap text-center">
                <ul class="list-unstyled d-flex justfiy-content-space-between">
                    <li class="features btn">Features</li>
                    <li class="onsale btn">On Sale</li>
                </ul>
            </div>
            </div>
        </div>
    </div>
    <x-products :products="$products" >

    </x-products>
   
    <div class="container text-center  mt-5 mb-5">
        <a id="view-all-products" href="{{route('shop.index')}}" class="btn btn-success btn-lg">View More Products</a>
    </div>

    <x-blog>

    </x-blog>

    <x-footer>
        
    </x-footer>
</x-layout>
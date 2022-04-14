<div class="bg-primary p-3">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
        <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <!-- <div class="pr-10"></div> -->
        <ul class="navbar-nav me-auto  mb-2 mb-lg-0 d-flex flex-left">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/shop">Shop</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('cart.index')}}"> Cart 
                @if (!ShoppingCart::isEmpty())
                    <span id="cart-count">{{ShoppingCart::countRows()}}</span> 
                @endif
            </a>
        </li>
        </ul>
        {{-- <form class="d-flex flex-left">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
        </form> --}}
        </div>
    </div>
    </nav>
</div>
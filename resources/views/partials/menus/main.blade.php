{{-- <ul class="navbar-nav me-auto  mb-2 mb-lg-0 d-flex flex-left">
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
</ul> --}}
  
<ul class="navbar-nav me-auto  mb-2 mb-lg-0 d-flex flex-left">
    @foreach($items as $menu_item)
        <li class="nav-item">
            <a class="nav-link" href="{{ $menu_item->link() }}">{{ $menu_item->title }}
                @if (!ShoppingCart::isEmpty())
                    <span id="cart-count">{{ShoppingCart::countRows()}}</span> 
                @endif
            </a>
        </li>
    @endforeach
</ul>
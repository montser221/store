<x-layout>
    @section('title',$product->slug)

    <x-header>

    </x-header>
    <x-breadcrumbs name="Product" slug="{{$product->slug}}">
    
    </x-breadcrumbs>

    <x-product  
        :product="$product"      >
              <x-might-also-like :slug="$product->slug">

              </x-might-also-like>
    </x-product>
    <x-footer>
        
    </x-footer>
</x-layout>
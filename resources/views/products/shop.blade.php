<x-layout>
    @section('title','Shop')

    <x-header>

    </x-header>
    
    <x-breadcrumbs name="Shop">
        
     </x-breadcrumbs>
   

    <x-shop :products="$products" :categories="$categories" :categoryName="$categoryName">

    </x-shop>
    
    <x-footer>
        
    </x-footer>
</x-layout>
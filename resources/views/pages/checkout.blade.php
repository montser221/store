<x-layout>
    @section('title','checkout')
    
    <x-header>

    </x-header>

    <div>
        <x-checkout :subtotal="$subtotal" :discount="$discount">

        </x-checkout>
        
    </div>

    <x-footer>
        
    </x-footer>
</x-layout>
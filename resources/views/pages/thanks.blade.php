<x-layout>
    @section('title','Thank You Page')

    <x-header>
    </x-header>

    <div class="container">
        @include('includes.success')

        <div class="my-4">

            <a class="btn btn-primary btn-lg" href="{{route('shop.index')}}">Continue Shopping</a>
        </div>
    </div>

    <x-footer>
    </x-footer>
</x-layout>
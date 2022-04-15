<x-layout>
    <x-header>
    </x-header>
    <div class="container my-5">
        <div class="row">
            {{--
                <div>{{$item->title}}</div>
                --}}
                {{-- {{dd($post_items)}} --}}
            @foreach ($post_items as $item)
                <div class="col-md-4 ">
                    <h4 class="title fs-6"> <a href="{{route('show',$item->id)}}" class=" text-black-50">{{$item->title}}</a> <span>Created By {{$item->author_id}}</span> Published At <span>{{$item->created_at->format('Y/M/D H:I')}}</span> </h4>
                    <div class="body mb-3">
                        {{ substr($item->body,0,50) }}
                    </div>
                    <div >
                    </div>

                    <a href="{{route('show',$item->id)}}" class=" text-black-50">
                        <img class="img-thumbnail" src="{{asset('storage/'.$item->image)}}" alt="" srcset="">    
                        Read More
                    </a>
                </div>
            @endforeach 
            
        </div>
    </div>
    <x-footer>
    </x-footer>
</x-layout>
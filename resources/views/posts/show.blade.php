<x-layout>
    <x-header>
    </x-header>
    <div class="container my-5">
        <div class="row">
                <div class="col-md-10 ">
                    <h4 class="title fs-6"> {{$post->title}} 
                        <span>Created By {{$post->author_id}}</span> 
                        Published At <span>{{$post->created_at->format('Y/M/D H:I')}}</span> 
                    </h4>
                    <div class="body mb-3">
                        {!! $post->body!!}
                    </div>
                    <div >
                    </div>
                    <img class="img-thumbnail" src="{{asset('storage/'.$post->image)}}" alt="" srcset="">    
                </div> 
        </div>
    </div>
    <x-footer>
    </x-footer>
</x-layout>
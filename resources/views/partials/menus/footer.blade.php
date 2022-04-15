{{-- <ul class="list-unstyled">
    <li class="d-inline px-3 text-white fw-bold">Fowllow Us:</li>
    <li class="d-inline px-3 "><a href="facebook.com/monti"><i class="fa-brands text-white fa-xl  fa-facebook"></i></a></li>
    <li class="d-inline px-3 "><a href="twitter.com/monti"><i class="fa-brands text-white  fa-xl fa-twitter"></i></a></li>
    <li class="d-inline px-3 "><a href="linkedin.com/monti"><i class="fa-brands text-white fa-xl  fa-linkedin"></i></a></li>
    <li class="d-inline px-3 "><a href="instagram.com/monti"><i class="fa-brands text-white fa-xl s fa-instagram"></i></a></li>
    <li class="d-inline px-3 "><a href="youtube.com/monti"><i class="fa-brands text-white fa-xl s fa-youtube"></i></a></li>
</ul> --}}

<ul class="list-unstyled">
    @foreach($items as $menu_item)
        @if ($menu_item->title =='Fowllow Us:')
            <li class="d-inline px-1 text-white fw-bold">Fowllow Us:</li>
        @endif
        <li class="d-inline px-2">
            <a  href="{{ $menu_item->link() }}">
                <i class="fa-brands text-white  fa-xl {{ $menu_item->title }}"></i>
            </a>
        </li>
    @endforeach
</ul>
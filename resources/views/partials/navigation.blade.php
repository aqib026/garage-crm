

<ul class="form-navbar pl-0 list-unstyled d-flex align-items-center justify-content-center mb-0 mt-3">
    <li><a class="nav-link" href="{{ route('registred.vehicles') }}">Registered Vehicle</a></li>
    <li><a class="nav-link" href="{{ route('work.orders') }}">Work Orders</a></li>
    <li><a class="nav-link  @if(Request::segment(1)=='dealers-list'|| Request::segment(1)=='create-dealer' || Request::segment(1)=='edit-dealer') {{'active'}} @endif"  href="{{ route('dealer.index') }}">Dealers Parts</a></li>
    <li><a class="nav-link  @if(Request::segment(1)=='part-orders'|| Request::segment(1)=='create-orders' || Request::segment(1)=='edit-parts-orders') {{'active'}} @endif"  href="{{ route('parts.orders.index') }}">Parts Order</a></li>
   
   
   
   <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>    
    </li>

</ul>

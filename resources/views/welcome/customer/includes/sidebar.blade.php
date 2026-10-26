<ul class="nav nav-tabs mb-6" role="tablist" style="padding: 0 15px;">
    @if(Auth::user()->admin)
    <li class="link-item">
        <a href="{{route('admin.dashboard')}}">Admin Dashboard</a>
    </li>
    @endif
    <li class="link-item">
        <a href="{{route('customer.dashboard')}}" class="{{Request::is('customer/dashboard')? 'active' : ''}}">Dashboard</a>
    </li>
    <li class="link-item">
        <a href="{{route('customer.myOrders')}}" class="{{Request::is('customer/orders*')? 'active' : ''}}">Orders</a>
    </li>
    <li class="link-item">
        <a href="{{route('customer.profile')}}" class="{{Request::is('customer/profile*')? 'active' : ''}}">Account details</a>
    </li>
    <li class="link-item">
        <a href="{{route('myWishlist')}}">Wishlist</a>
    </li>
    <li class="link-item">
        <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
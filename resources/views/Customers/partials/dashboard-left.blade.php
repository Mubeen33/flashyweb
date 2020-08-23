<aside class="ps-widget--account-dashboard">
    <div class="ps-widget__header"><img src="img/users/3.jpg" alt="">
        <figure>
            <figcaption>Hello</figcaption>
            <p><a href="#">{{ Auth::guard('customer')->user()->first_name }}</a></p>
        </figure>
    </div>
    <div class="ps-widget__content">
        <ul>
            <li @if(Request::is('customer/dashboard')) class="active" @endif><a href="{{ route('customer.dashboard.get') }}"><i class="icon-user"></i> Account Information</a></li>
            <li><a href="#"><i class="icon-alarm-ringing"></i> Notifications</a></li>
            <li><a href="#"><i class="icon-papers"></i> Invoices</a></li>
            <li @if(Request::is('customer/addresses')) class="active" @endif><a href="{{ route('customer.address.get') }}"><i class="icon-map-marker"></i> Address</a></li>
            <li><a href="#"><i class="icon-store"></i> Recent Viewed Product</a></li>
            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
            <li>
                <a href="#" onclick="event.preventDefault();document.getElementById('logout--form').submit();">
                    <i class="icon-power-switch"></i>Logout
                </a>
                <form id="logout--form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
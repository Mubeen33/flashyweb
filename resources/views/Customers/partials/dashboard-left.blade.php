<aside class="ps-widget--account-dashboard">
    <div class="ps-widget__header"><img src="img/users/3.jpg" alt="">
        <figure>
            <figcaption>Hello</figcaption>
            <p><a href="#">{{ Auth::guard('customer')->user()->first_name }}</a></p>
        </figure>
    </div>
    <div class="ps-widget__content">
        <ul class="customer_menu">
            <li class="active"  id="customer_profileTab"><a id="customer_profile" style="cursor: pointer;"><i class="icon-user"></i> Account Information</a></li>
            <li><a href="#"><i class="icon-alarm-ringing"></i> Notifications</a></li>
            <li><a href="#"><i class="icon-papers"></i> Invoices</a></li>
            <li class="" id="customer_addressTab"><a  id="customer_address" style="cursor: pointer;"><i class="icon-map-marker"></i> Address</a></li>
            <li><a href="#"><i class="icon-store"></i> Recent Viewed Product</a></li>
            <li class=""><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
            <li class="" id="customer_ordersTab"><a id="customer_orders" style="cursor: pointer;"><i class="icon-bag"></i> Orders</a></li>
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
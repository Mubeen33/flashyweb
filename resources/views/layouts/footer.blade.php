
        <div class="ps-newsletter">
            <div class="ps-container">
                <form class="ps-form--newsletter" action="do_action" method="post">
                    <div class="row">
                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__left">
                                <h3>Newsletter</h3>
                                <p>Subcribe to get information about products and coupons</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__right">
                                <div class="form-group--nest">
                                    <input class="form-control" type="email" placeholder="Email address">
                                    <button class="ps-btn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="ps-footer">
        <div class="ps-container">
            <div class="ps-footer__widgets">
                <aside class="widget widget_footer widget_contact-us">
                    <h4 class="widget-title">Contact us</h4>
                    <div class="widget_content">
                        <p>Call us 24/7</p>
                        <h3>1800 97 97 69</h3>
                        <p>502 New Design Str, Melbourne, Australia <br><a href="mailto:contact@martfury.co">contact@martfury.co</a></p>
                        <ul class="ps-list--social">
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </aside>
                <aside class="widget widget_footer">
                    <h4 class="widget-title">Quick links</h4>
                    <ul class="ps-list--link">
                        @foreach(\App\Models\Page::where('page_type' , 'Q')->where('visibility' , 1)->orderBy('position')->get() as $page)
                        <li><a href="{{route('slug_name' , $page->slug)}}">{{$page->title}}</a></li>
                        @endforeach
                    </ul>
                </aside>
                <aside class="widget widget_footer">
                    <h4 class="widget-title">Company</h4>
                    <ul class="ps-list--link">
                        @foreach(\App\Models\Page::where('page_type' , 'C')->where('visibility' , 1)->orderBy('position')->get() as $page)
                        <li><a href="{{route('slug_name' , $page->slug)}}">{{$page->title}}</a></li>
                        @endforeach
                    </ul>
                </aside>
                <aside class="widget widget_footer">
                    <h4 class="widget-title">Bussiness</h4>
                    <ul class="ps-list--link">
                        @foreach(\App\Models\Page::where('page_type' , 'B')->where('visibility' , 1)->orderBy('position')->get() as $page)
                        <li><a href="{{route('slug_name' , $page->slug)}}">{{$page->title}}</a></li>
                        @endforeach
                    </ul>
                </aside>
            </div>
            <div class="ps-footer__links"  hidden>
                {{-- @php
    //show_image_nav -for show on navigation
    $categories = (\App\Models\Category::orderBy('id','desc')
                            ->where('deleted', '=', 0)
                            ->get());
@endphp
            @foreach($categories as $Category)
                <p><a href="#">{{ $Category->getParentsNames() }}</a>
                </p>
            @endforeach     --}}
                {{-- <p><strong>Clothing &amp; Apparel:</strong><a href="#">Printers</a><a href="#">Projectors</a><a href="#">Scanners</a><a href="#">Store &amp; Business</a><a href="#">4K Ultra HD TVs</a><a href="#">LED TVs</a><a href="#">OLED TVs</a>
                </p>
                <p><strong>Home, Garden &amp; Kitchen:</strong><a href="#">Cookware</a><a href="#">Decoration</a><a href="#">Furniture</a><a href="#">Garden Tools</a><a href="#">Garden Equipments</a><a href="#">Powers And Hand Tools</a><a href="#">Utensil &amp; Gadget</a>
                </p>
                <p><strong>Health &amp; Beauty:</strong><a href="#">Hair Care</a><a href="#">Decoration</a><a href="#">Hair Care</a><a href="#">Makeup</a><a href="#">Body Shower</a><a href="#">Skin Care</a><a href="#">Cologine</a><a href="#">Perfume</a>
                </p>
                <p><strong>Jewelry &amp; Watches:</strong><a href="#">Necklace</a><a href="#">Pendant</a><a href="#">Diamond Ring</a><a href="#">Sliver Earing</a><a href="#">Leather Watcher</a><a href="#">Gucci</a>
                </p>
                <p><strong>Computer &amp; Technologies:</strong><a href="#">Desktop PC</a><a href="#">Laptop</a><a href="#">Smartphones</a><a href="#">Tablet</a><a href="#">Game Controller</a><a href="#">Audio &amp; Video</a><a href="#">Wireless Speaker</a><a href="#">Done</a>
                </p> --}}
            </div>
            <div class="ps-footer__copyright">
                <p>© 2018 Martfury. All Rights Reserved</p>
                <p><span>We Using Safe Payment For:</span><a href="#"><img src="img/payment-method/1.jpg" alt=""></a><a href="#"><img src="img/payment-method/2.jpg" alt=""></a><a href="#"><img src="img/payment-method/3.jpg" alt=""></a><a href="#"><img src="img/payment-method/4.jpg" alt=""></a><a href="#"><img src="img/payment-method/5.jpg" alt=""></a></p>
            </div>
        </div>
    </footer>

    @include('layouts.partials.popup')

    <div id="back2top"><i class="pe-7s-angle-up"></i></div>
    <div class="ps-site-overlay"></div>
    <div id="loader-wrapper">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="do_action" method="post">
                <input class="form-control" type="text" placeholder="Search for...">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
                <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                    <div class="ps-product__header">
                        <div class="ps-product__thumbnail" data-vertical="false">
                            <div class="ps-product__images" data-arrow="true">
                                <div class="item"><img src="img/products/detail/fullwidth/1.jpg" alt=""></div>
                                <div class="item"><img src="img/products/detail/fullwidth/2.jpg" alt=""></div>
                                <div class="item"><img src="img/products/detail/fullwidth/3.jpg" alt=""></div>
                            </div>
                        </div>
                        <div class="ps-product__info">
                            <h1>Marshall Kilburn Portable Wireless Speaker</h1>
                            <div class="ps-product__meta">
                                <p>Brand:<a href="shop-default.html">Sony</a></p>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>(1 review)</span>
                                </div>
                            </div>
                            <h4 class="ps-product__price">$36.78 – $56.99</h4>
                            <div class="ps-product__desc">
                                <p>Sold By:<a href="shop-default.html"><strong> Go Pro</strong></a></p>
                                <ul class="ps-list--dot">
                                    <li> Unrestrained and portable active stereo speaker</li>
                                    <li> Free from the confines of wires and chords</li>
                                    <li> 20 hours of portable capabilities</li>
                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                </ul>
                            </div>
                            <div class="ps-product__shopping"><a class="ps-btn ps-btn--black" href="#">Add to cart</a><a class="ps-btn" href="#">Buy Now</a>
                                <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    @csrf
        <script src="{{ asset('theme/plugins/jquery-1.12.4.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/popper.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/bootstrap4/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/masonry.pkgd.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/isotope.pkgd.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/jquery.matchHeight-min.js')}}"></script>
        <script src="{{ asset('theme/plugins/slick/slick/slick.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/slick-animation.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/lightGallery-master/dist/js/lightgallery-all.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/sticky-sidebar/dist/sticky-sidebar.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/jquery.slimscroll.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/select2/dist/js/select2.full.min.js')}}"></script>
        <script src="{{ asset('theme/plugins/gmap3.min.js')}}"></script>
    <!-- custom scripts-->
    <script src="{{ asset('theme/js/main.js')}}"></script>
    <script src="{{ asset('theme/extra-lib/zoomsl.js')}}"></script>



        @include('sweetalert::alert')

        <script type="text/javascript">
        $( function() {

        showCart();

   } );
        function showCart(){

          $.ajax({
           type:"POST",
           url:'{{ route('cart.products.addtocart') }}',
            data:{ _token : $('input[name=_token]').val()},
            success:function(data){

              var data = data.split("`");
              $('#ps-cart__items').html(data[0]);
              $('#total_cart_items').html(data[1]);

               var val = $('#total_cart_items').html();

                if (val == 0) {

                    $('#ps-cart__items').css('display','none');
                }else{

                    $('#ps-cart__items').css('display','');
                }

            }
          });
        }

function remove_cart(p_id){

    $.ajax({
        type:"POST",
           url:'{{ route('cart.products.addtocart') }}',
        data:{action:'delete',p_id:p_id,_token : $('input[name=_token').val()},
        success:function(data){

            var data = data.split("`");
            $('#ps-cart__items').html(data[0]);
            $('#total_cart_items').html(data[1]);
            if (data[1] == 0) {

            $('#ps-cart__items').css('display','none');
            }else{

                $('#ps-cart__items').css('display','');
            }
        }
    });
}
        window.addEventListener('swal',function(e){
            Swal.fire(
                e.detail.title,
                e.detail.message,
                e.detail.icon
            )
        });

        window.addEventListener('toast',function(e){
            console.log(e.detail)
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire(e.detail)
        });



    </script>

        @livewireScripts
        <script src="{{asset('vendor/livewire/livewire.js')}}"></script>
        @stack('scripts')




</body>

</html>

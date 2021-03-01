<div>

    <div
        x-show.transition.in="open=='view'"
        data-animation-in="fadeIn"
        data-delay-in="2"
        data-duration-in="2"
        data-animation-out="fadeOUt"
        data-delay-out="2"
        data-duration-out="2">

        @if($listOfSeller)
        @foreach($listOfSeller as $seller)
            <h3>{{$seller['vendor']}}</h3>
            <table class="table ps-table--shopping-cart"  wire:key="{{$seller['vendor_id']}}">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Product Title</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>Shipping</th>
                    <th>TOTAL</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cartProducts as $key=> $product)
                    @if($seller['vendor']==$product['vendor'])
                        <tr wire:key="{{$product['product_id']}}">
                            <td>
                                <div class="ps-product--cart">
                                    <div class="ps-product__thumbnail"><a href="product-default.html">
                                            <img src="{{$product['image'] ?? ''}}" alt=""></a></div>
                                </div>
                            </td>
                            <td>
                                <div class="ps-product__content">
                                    <a href="#" wire:ignore.self>
                                        {{$product['name'] ?? ''}}
                                    </a>
                                    <p>Sold By:<strong> {{$product['vendor'] ?? ''}}</strong></p>
                                </div>
                            </td>
                            <td class="price">R {{$product['price'] }}</td>
                            <td>
                                <div class="form-group--number">
                                    <button class="up" wire:click="increament({{$key}},{{$product['quantity']}})">+</button>
                                    <button class="down" wire:click="decrement({{$key}},{{$product['quantity']}})">-</button>
                                    <input class="form-control" type="text" placeholder="1" value="{{$product['quantity']}}">
                                </div>
                            </td>
                            <td class="price">{{$product['quantity']}} * {{$product['shipping_price']}} = {{$product['quantity']*$product['shipping_price']}}</td>

                            <td>R {{((int)$product['quantity'])*$product['price']}}</td>
                            <td><a  href="#" wire:ignore.self wire:click="removeItem({{$key}})"><i class="icon-trash"></i></a></td>
                            {{--                    <td><a href="#" wire:click="viewChange"><i class="icon-cross"></i></a></td>--}}
                        </tr>
                    @endif

                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        @endforeach

        @endif


        @include('.livewire/cart/component/footer',['action'=>'home,delivery'])

    </div>

</div>

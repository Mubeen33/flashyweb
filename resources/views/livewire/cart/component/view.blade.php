<div>
    <div x-show.transition.in="open=='view'" data-animation-in="fadeIn" data-delay-in="2" data-duration-in="2" data-animation-out="fadeOUt" data-delay-out="2" data-duration-out="2">


        <table class="table ps-table--shopping-cart"  >
            <thead>
            <tr>
                <th>Product name</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>TOTAL</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cartProducts as $key=> $product)
                <tr>
                    <td>
                        <div class="ps-product--cart">
                            <div class="ps-product__thumbnail"><a href="product-default.html">
                                    <img src="{{$product['image'] ?? ''}}" alt=""></a></div>
                            <div class="ps-product__content">
                                <a href="product-default.html">
                                    {{$product['name'] ?? ''}}
                                </a>
                                <p>Sold By:<strong> {{$product['vendor'] ?? ''}}</strong></p>
                            </div>
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
                    <td>R {{((int)$product['quantity'])*$product['price']}}</td>
                    <td><a href="#" wire:click="removeItem({{$key}})"><i class="icon-cross"></i></a></td>
                    {{--                    <td><a href="#" wire:click="viewChange"><i class="icon-cross"></i></a></td>--}}
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        @include('.livewire/cart/component/footer',['action'=>'delivery'])
    </div>

</div>

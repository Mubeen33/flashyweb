<div  x-show.transition.out.duration.1000ms.scale.0="open=='add-address'">
    {{--       <livewire:add-to-cart.customer-address-form />--}}
    <livewire:cart.add-address />
    @include('.livewire/cart/component/footer',['action'=>'payment'])

</div>

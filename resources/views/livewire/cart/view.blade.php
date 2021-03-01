
<div>
    <div x-data="data()">

        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li x-text="getHeading()"></li>
                </ul>
            </div>
        </div>


{{--        <div>--}}
{{--            <p>Livewire: {{ var_export($componentName) }}</p>--}}
{{--            <p x-text="['Alpine.js: '+open]"></p>--}}
{{--            <p>Session : {{Session::get('componentName')}} </p>--}}
{{--        </div>--}}


        <div class="ps-section--shopping ps-shopping-cart pt-5" >
            <div class="container">
                <div class="ps-section__header pb-5">
                    <h1 x-text="getHeading()" ></h1>

                </div>



                <div class="ps-section__content" >
                    <div class="table-responsive" >









                        {{--                     <template x-if="open =='view'">--}}
                        @include('.livewire/cart/component/view')

                        @include('.livewire/cart/component/delivery')

                        @include('.livewire/cart/component/address')

                        @include('.livewire/cart/component/add-address')

                        {{--                    </template>--}}

                        {{--                    <template x-if="open =='address'">--}}

                        {{--                    </template>--}}

                        {{--                    <template x-if="open =='add-address'">--}}

                        {{--                    </template>--}}

                        {{--                    <template x-if="open =='items'">--}}
                        @include('.livewire/cart/component/items')
                        {{--                    </template>--}}

                        {{--                    <template x-if="open =='payment'">--}}
                        @include('.livewire/cart/component/payment')

                        @include('.livewire/cart/component/order-success')
                        {{--                    </template>--}}

                    </div>

                </div>
                <hr/>
            </div>
        </div>
    </div>
</div>
<script>
    function data(){
        return {
            // open:'view',
            // open:@this.entangle('componentName'),
            open:@this.entangle('componentName'),
            heading:{'view':'Shopping Cart','delivery':'Delivery','address':'Address','add-address':'Add Address'},
            address:'',
            // addressList:@this.entangle('addressList'),
            getHeading(){
                return this.heading[this.open]
            },
            updateComponent(tab){
                this.open=tab

            },
            isActiveTab(tab){
                return tab==this.open
            },
            back:@this.entangle('back')


        }
    }

</script>

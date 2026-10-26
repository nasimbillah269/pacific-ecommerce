{{--@if($product)
<div class="minipopup-box show" style="top: 0px;">
    <div class="product product-list-sm  product-cart">
        <figure class="product-media">
            <a href="{{route('productView',$product->slug?:Str::slug($product->name))}}">
            <img src="{{assetUrl($product->image())}}" alt="{{$product->name}}" width="80" height="90">
            </a>
        </figure>
        <div class="product-details">
            <h4 class="product-name">
                <a href="{{route('productView',$product->slug?:Str::slug($product->name))}}">{{$product->name}}</a>
            </h4>
            <p>has been added to cart:</p>
        </div>
    </div>
    <div class="product-action">
        <a href="{{route('carts')}}" class="btn btn-rounded btn-sm">View Cart</a>
        <a href="{{route('checkout')}}" class="btn btn-dark btn-rounded btn-sm">Checkout</a>
    </div>
</div>
@endif--}}


<div class="cartDropdown">

    <a href="{{ route('carts') }}" class="headCartLink">
        <div class="headCart">
            <span>
                 @isset($cartTotalPrice)
                        {{ priceFullFormat($cartTotalPrice) }}
                    @endisset
            </span>
             
            <div class="cartIcon">
                
                
                
                <i class="fa fa-shopping-cart"></i>

                @isset($carts)
                <span class="cartCount">{{ $carts->count() }}</span>
                @endisset
            </div>

         
        </div>
    </a>

    <div class="cardBodybox">

        @isset($carts)

        @if($carts->count() > 0)

        <div class="productBoxlist">

            <ul class="cartBoxpart">

                @foreach($carts as $cart)

                @if($cart->product)

                <li>

                    <div class="cartItem">

                        <div class="cartImage">
                            <a href="{{ route('productView',$cart->product->slug ?: Str::slug($cart->product->name)) }}">
                                <img src="{{ assetUrl($cart->product->image()) }}">
                            </a>
                        </div>

                        <div class="cartContent">

                            <a href="{{ route('productView',$cart->product->slug ?: Str::slug($cart->product->name)) }}">
                                {{ $cart->product->name }}
                            </a>

                            <span>
                                {{ priceFullFormat($cart->price ?? $cart->product->offerPrice()) }}
                            </span>

                        </div>

                        <div class="cartRemove">
                            <i
                                class="fa fa-times cartUpdate"
                                data-url="{{ route('changeToCart',[$cart,'delete']) }}">
                            </i>
                        </div>

                    </div>

                </li>

                @endif

                @endforeach

            </ul>

        </div>

        <div class="subtotalBox">

            <strong>
                Subtotal :
            </strong>
            
            <span>
                 @isset($cartTotalPrice)
                    {{ priceFullFormat($cartTotalPrice) }}
                @endisset
            </span>
            

        </div>

        <div class="cartBoxbtn">

            <a href="{{ route('carts') }}" class="viewcartBox">
                View Cart
            </a>

            <a href="{{ route('checkout') }}" class="checkoutBox">
                Checkout
            </a>

        </div>

        @else

        <div class="emptyCart">

            <!--<i class="fa fa-shopping-cart"></i>-->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 19" style="opacity:.1;height:80px;">
				<path d="M8.5 0C6.7 0 5.3 1.2 5.3 2.7v2H2.1c-.3 0-.6.3-.7.7L0 18.2c0 .4.2.8.6.8h15.7c.4 0 .7-.3.7-.7v-.1L15.6 5.4c0-.3-.3-.6-.7-.6h-3.2v-2c0-1.6-1.4-2.8-3.2-2.8zM6.7 2.7c0-.8.8-1.4 1.8-1.4s1.8.6 1.8 1.4v2H6.7v-2zm7.5 3.4 1.3 11.5h-14L2.8 6.1h2.5v1.4c0 .4.3.7.7.7.4 0 .7-.3.7-.7V6.1h3.5v1.4c0 .4.3.7.7.7s.7-.3.7-.7V6.1h2.6z" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"></path>
			</svg>

            <p>No products in the cart.</p>

            <a href="">Return to shop</a>

        </div>

        @endif

        @endisset

    </div>

</div>
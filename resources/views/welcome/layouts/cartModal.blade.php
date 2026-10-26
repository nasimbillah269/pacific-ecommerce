
    <div class="cart-inner" style="flex-direction: column;display: flex;justify-content: space-between;">
        <div class="cart_top">
            <div class="row" style="margin: 0;">
                <div class="col-10" style="padding: 0;">
                    <h4 style="color: black;margin:0;">Cart Items</h4>
                </div>
                <div class="col-2" style="padding: 0; text-align: right;">
                    <a href="javascript:void(0)" class="side-modals-close">
                        <svg class="w-[24px] h-[24px]" style="width:24px;height:24px;color: black;" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                              <path d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"></path>
                            </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="cart_media" style="flex: 1;overflow-y: auto;">
            
            @isset($carts)
            
            @if($carts->count() > 0)
            
                @if(general()->minimum_shopping > 0)
                    <div class="freeShipping" style="padding: 10px;border: 1px solid #f1ecec;background: #e8e8e8;border-radius: 5px;">
                        <p>
                            @if($cartTotalPrice >= general()->minimum_shopping)
                            <b>Congratulations!</b> You got free shipping
                            @else
                            You're <b>{{priceFullFormat(general()->minimum_shopping - $cartTotalPrice)}}</b> away from free shipping (In Dhaka City)
                            @endif
                        </p>
                        @php
                            $perchant =round(($cartTotalPrice / general()->minimum_shopping) * 100);
                            if($perchant > 100){
                            $perchant   =100;
                            }
                        @endphp
                        <div class="progress" style="background: #fca6a6;">
                            <div class="progress-bar" role="progressbar" style="width: {{$perchant}}%;" aria-valuenow="{{$perchant}}" aria-valuemin="0" aria-valuemax="100">{{$perchant}}%</div>
                        </div>
                    </div>
                @endif
                
                <script>
                    
                        // window.dataLayer = window.dataLayer || [];
                        // dataLayer.push({
                        //     event: "view_cart",
                        //     ecommerce: {
                        //         currency: "{{ general()->currency }}", // Currency of the transaction
                        //         value: {{ $grandTotal}}, 
                        //         items: [
                        //             @foreach($carts as $item)
                        //             {
                        //                 @if($product =$item->product)
                        //                 item_id: "{{ $product->id }}",
                        //                 item_name: "{{ $product->name }}",
                        //                 item_category: "{!! implode(' - ', $product->productCategories->pluck('name')->toArray()) !!}",
                        //                 item_brand: "{{ $product->brand ? $product->brand->name : '' }}",
                        //                 price: "{{ $product->offerPrice() }}",
                        //                 quantity: "{{ $item->quantity }}",
                                    
                        //                 @endif
                        //             }@if(!$loop->last),@endif
                        //             @endforeach
                        //         ]
                        //     }
                        // });

                    function viewCartDataCall(){
                        window.dataLayer = window.dataLayer || [];
                        dataLayer.push({
                            event: "view_cart",
                            ecommerce: {
                                currency: "{{ general()->currency }}", // Currency of the transaction
                                value: {{ round($cartTotalPrice)}}, 
                                items: [
                                    @foreach($carts as $item)
                                    {
                                        @if($product =$item->product)
                                        item_id: "{{ $product->id }}",
                                        item_name: "{{ $product->name }}",
                                        item_category: "{!! implode(' - ', $product->productCategories->pluck('name')->toArray()) !!}",
                                        item_brand: "{{ $product->brand ? $product->brand->name : '' }}",
                                        price: "{{ $product->offerPrice() }}",
                                        quantity: "{{ $item->quantity }}",
                                    
                                        @endif
                                    }@if(!$loop->last),@endif
                                    @endforeach
                                ]
                            }
                        });
                    }  
                </script>
                
                
               <ul class="cartListMedia">
                   @foreach($carts as $cart)
                   
                   <li>
                       
                     
                         
                        <div class="item">
                            
                              @if($product=$cart->product)
                        <img src="{{assetUrl($product->image())}}" alt="{{$product->name}}">
                         @endif
                            
                            <div>
                                  
                                    @if($product=$cart->product)
                                   <span class="title">{{$product->name}}</span>
                                   @endif
                                 
                                 
                                <span class="price">{{$cart->quantity}} X {{priceFullFormat($cart->itemprice())}}</span>
                            </div>
                        
                        </div>
                        
                        <div class="d-flex">
                            <div class="">
                                <div class="cartInput">
                                    <span class="cartUpdate" data-url="{{ route('changeToCart', [$cart, 'decrement']) }}">-</span>
                                    <input type="number" readonly="" class="quantity" value="{{$cart->quantity}}">
                                    <span class="cartUpdate" data-url="{{ route('changeToCart', [$cart, 'increment']) }}">+</span>
                                </div>
                            </div>
                            <span class="remove cartUpdate" data-url="{{ route('changeToCart', [$cart, 'delete']) }}"><i class="fa fa-trash"></i></span>
                        </div>
                        
                   </li>
                  
                   @endforeach
               </ul>
           @else
           
           <h2>Empty Is Cart</h2>
           
           @endif
           
           @endisset
        </div>
       <div class="cartFooter">
           @isset($carts)
           @if($carts->count() > 0)
           <!--<div class="" style="display: flex;justify-content: space-between;border-bottom: 1px solid #ede8e8;margin-bottom: 15px;">-->
           <!--    <p style="width: 50%;flex: 0 0 50%;text-align: center;">-->
           <!--        <i class="fa fa-edit"></i>-->
           <!--     <br>-->
           <!--        Note</p>-->
           <!--    <p style="width: 50%;flex: 0 0 50%;text-align: center;">-->
           <!--        <i class="fa fa-ticket"></i>-->
           <!--     <br>-->
           <!--        Coupuon-->
           <!--     </p>-->
           <!--</div>-->
           <div class="cartFoter" style="display: flex;justify-content: space-between;">
               <h5>Subtotal:</h5>
               <h4>{{priceFullFormat($cartTotalPrice)}}</h4>
           </div>
           <div class="sidcartButton">
               <!--<button class="btn orderModal orderModalAction"  type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">-->
               <!--    <i class="fa fa-shopping-cart"></i>-->
               <!--    Place Your order here-->
               <!--</button>-->
               <a class="sideCart" href="{{route('carts')}}">View Cart</a>
               <a class="sideCheck" href="{{route('checkout')}}" >Checkout</a>
           </div>
           @endif
           @endisset
       </div>
    </div>

    

    


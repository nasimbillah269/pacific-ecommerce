@isset($carts)
@if($carts->count() > 0)

<script>
    function beginCheckout(){
        window.dataLayer = window.dataLayer || [];
        dataLayer.push({
            event: "begin_checkout",
            ecommerce: {
                currency: "{{ general()->currency }}",
                value: {{ round($cartTotalPrice)}},
                shipping: {{ round($shippingCharge ?? 0) }},
                discount: {{ round($couponDisc ?? 0) }},
                items: [
                    @foreach($carts as $item)
                    {
                        @if($product =$item->product)
                        item_id: "{{ $item->id }}",
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="width:100%;text-align: center;">
           Place Order Cash on Delivery
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p style="font-size:22px;text-align:center;">
            Billing Details
        </p>
        <form class="checkout-form2" action="{{route('checkout')}}" method="post">
        @csrf
        <div class="">
            <div class="row">
                <label for="staticEmail" class="col-md-12 col-12 col-form-label">
                    Your name
                </label>
                <div class="col-md-12 col-12">
                    <div class="input-group mb-3">
                      <span class="input-group-text" >
                          <i class="fa fa-user"></i>
                      </span>
                      <input type="text" class="form-control valuecheck3" 
                      
                      value="{{ optional(Auth::user())->name ?? '' }}"
                      
                      name="name" 
                      required=""
                      placeholder="Your name"
                      >
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="staticEmail" class="col-md-12 col-12 col-form-label">
                    Your Mobile
                </label>
                <div class="col-md-12 col-12">
                    <div class="input-group mb-3">
                      <span class="input-group-text" >
                          <i class="fa fa-phone"></i>
                      </span>
                      <input type="text" class="form-control valuecheck3 mobileNumberInput2" 
                      value="{{ optional(Auth::user())->mobile ?? '' }}" 
                      name="mobile" 
                      required=""
                      placeholder="Mobile number"
                      >
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="staticEmail" class="col-md-12 col-12 col-form-label" >
                    District/City
                </label>
                <div class="col-md-12 col-12">
                    <div class="input-group mb-3">
                      <span class="input-group-text" >
                          <i class="fa fa-map"></i>
                      </span>
                      <select class="form-control" name="district" id="district2" required>
                            <option value="">Select District</option>
                            @foreach(geoData(3) as $data)
                            <option value="{{$data->id}}" >{{$data->name}}</option>
                            @endforeach
                      </select>
                      <select class="form-control" name="city" id="city2" required>
                          <option value="">Select City</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="staticEmail" class="col-md-12 col-12 col-form-label">
                    Address
                </label>
                <div class="col-md-12 col-12">
                    <div class="input-group mb-3">
                      <span class="input-group-text">
                          <i class="fa fa-map"></i>
                      </span>
                      <input type="text" class="form-control valuecheck3"  name="address" 
                      value="{{ optional(Auth::user())->address_line1 ?? '' }}"
                      required=""
                      placeholder="Address"
                      >
                    </div>
                    <input type="hidden" name="payment_option" value="handCash">
                </div>
            </div>
            <div class="row">
                <label for="staticEmail" class="col-md-12 col-12  col-form-label">
                    Order Note
                </label>
                <div class="col-md-12 col-12">
                    <div class="input-group mb-3">
                      <span class="input-group-text">
                          <i class="fa fa-edit"></i>
                      </span>
                      <input type="text" class="form-control valuecheck3"  name="note" 
                      value=""
                      placeholder="Order Note"
                      >
                    </div>
                </div>
            </div>
        </div>
        <div class="discountApply" style="margin-bottom:10px;">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter Coupon Code">
                <span class="apply" style="background: #F44336;padding: 10px 20px;color: white;cursor: pointer;">Apply</span>
            </div>
            <span class="couponErro"></span>
        </div>
        <h5 style="margin-bottom:10px;">
            Cart Item
        </h5>
        
        <div class="cartItemsList">
            <ul>
                @foreach($carts as $cart)
                <li>
                    @if($product=$cart->product)
                    <div style="position:relative;">
                        <img src="{{assetUrl($product->image())}}" alt="{{$product->name}}">
                        <span style="position: absolute;width: 22px;height: 22px;background: #666;top: -10px;right: -10px;border-radius: 100%;text-align: center;color: white;font-size: 12px;display: flex;justify-content: center;align-items: center;">{{$cart->quantity}}</span>
                    </div>
                    <span class="title">{{$product->name}}</span>
                    @endif
                    <span class="price">{{priceFullFormat($cart->subtotal())}}</span>
                </li>
                @endforeach

            </ul>
        </div>
        <br>
        @php
        $isDhaka='yes';
        @endphp
        <div class="cartItemsTotal">
            @include(general()->theme.'.carts.includes.orderSummery2')
        </div>
        <div style="text-align:center;">

        <button class="btn orderModal" type="submit" >
           <i class="fa fa-shopping-cart"></i>
           Submit Your Order Confirm
       </button>
        
            @include(general()->theme.'.layouts.banglaNote')
        
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endif
@endisset
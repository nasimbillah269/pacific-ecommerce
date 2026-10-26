@extends(welcomeTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Checkout')}}</title>
@endsection 
@section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('Checkout')}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{assetUrl(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('checkout')}}" />
<link rel="canonical" href="{{route('checkout')}}">
@endsection 
@push('css')
<style>
.page-content {
    padding: 50px 0;
}
.order_review {
    padding: 20px;
    background-color: unset;
    border: 2px solid #2c378d;
}
.checkOut {
    padding: 20px;
    background-color: unset;
}
.checkOut .form-control {
    border-radius: 0;
    margin: 10px 0 20px;
}
.text-right {
    text-align: right !important;
    padding: 5px;
}
.btn.disabled, .btn:disabled, fieldset:disabled .btn {
        border: none;
    background: #25d366;
    color: #fff;
    border-radius: 0;
    margin-bottom: 20px;
}
.heading_s1 {
    margin-bottom: 10px;
}
.order_review button {
       background-color: #25d366;
    border: none;
    display: inline-block;
    margin-top: 20px;
    color: #fff;
    font-weight: bold;
    padding: 8px 33px;
    width: 100%;
    margin-bottom: 20px;
    border-radius: 0;
}
.order_review button:hover {
    background-color: #0a577c;
    color: #fff;
}
.checkOut .form-control:focus {
    box-shadow: none;
}


.orderNoteInfo p {
    font-size: 14px;
}

.orderSummryTable .table tfoot tr th {
    font-weight: 500;
    font-size: 15px;
}




.checkout-progress{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:18px;
    padding:35px 15px;
    background:#fff;
    font-family:'Poppins',sans-serif;
}

.progress-step{
    display:flex;
    align-items:center;
    gap:10px;
}

.step-circle{
    width:30px;
    height:30px;
    border-radius:50%;
    background:#cfcfcf;
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:16px;
    font-weight:600;
}

.step-title{
    font-size:18px;
    font-weight:500;
    color:#c7c7c7;
    text-transform:uppercase;
    letter-spacing:.3px;
}

.progress-divider{
    color:#9d9d9d;
    font-size:28px;
    display:flex;
    align-items:center;
}

/* Active Step */

.progress-step.active .step-circle{
    background:#20d463;
}

.progress-step.active .step-title{
    color:#111;
    font-weight:600;
}

/* Hover */

.progress-step:hover .step-circle{
    background:#20d463;
}

.progress-step:hover .step-title{
    color:#111;
}

/* Responsive */

@media(max-width:768px){

    .checkout-progress{
        flex-wrap:wrap;
        gap:12px;
    }

    .step-title{
        font-size:14px;
    }

    .step-circle{
        width:24px;
        height:24px;
        font-size:13px;
    }

    .progress-divider{
        font-size:20px;
    }

}




.payment_option {
    width: 100%;
}

.payment-method {
    padding: 13px 5px;
    border-bottom: 1px solid #e5e5e5;
}

.payment-method:last-child {
    border-bottom: 0;
}

.custom-radio {
    display: flex;
    align-items: center;
    gap: 9px;
}

.custom-radio input {
    width: 15px;
    height: 15px;
    margin: 0;
    cursor: pointer;
    accent-color: #007bff;
}

.custom-radio label {
    margin: 0;
    cursor: pointer;
    color: #222;
    font-size: 14px;
    font-weight: 500;
}

.payment-text {
    display: none;
    margin: 10px 0 0 25px;
    padding-right: 10px;
    color: #222;
    font-size: 14px;
    line-height: 1.7;
}

.payment-method:has(.payment-radio:checked) .payment-text {
    display: block;
}






</style>

<script>
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({
        event: "page_view",
        page_category: "page",
        page_title: "Check Out",
        page_url: "{{route('checkout')}}"
    });
</script>

@endpush 

@section('contents')

<!-- Start of Page Header -->
{{--<div class="page-header">
    <div class="overlayPageHeaderNew">
        <div class="container">
            <h1 class="page-title mb-0">Checkout</h1>
        </div>
    </div>
</div>--}}
<!-- End of Page Header -->



<div class="checkout-progress">

    <div class="progress-step">
        <span class="step-circle">1</span>
        <span class="step-title">SHOPPING CART</span>
    </div>

    <div class="progress-divider">
        <i class="fa fa-angle-right"></i>
    </div>

    <div class="progress-step active">
        <span class="step-circle">2</span>
        <span class="step-title">CHECKOUT DETAILS</span>
    </div>

    <div class="progress-divider">
        <i class="fa fa-angle-right"></i>
    </div>

    <div class="progress-step">
        <span class="step-circle">3</span>
        <span class="step-title">ORDER COMPLETE</span>
    </div>

</div>


<!-- START SECTION SHOP -->
<div class="page-content">
    <div class="container">
    @isset($carts)
    @if($carts->count() > 0)
    
    
    <script>
        window.dataLayer = window.dataLayer || [];
        dataLayer.push({
            event: "begin_checkout",
            ecommerce: {
                currency: "{{ general()->currency }}",
                value: {{round($cartTotalPrice)}},
                shipping: {{ round($shippingCharge ?? 0)}},
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
    </script>
    
    
    <form class="checkout-form" action="{{route('checkout')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-7 mb-4">
                <div class="checkOut">
                    <div class="heading_s1">
                        <h4 class="">Billing & Shipping</h4>
                    </div>
                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" required class="form-control valuecheck valuecheck2" name="name" placeholder="Enter Your name *">
                    </div>
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input class="form-control valuecheck valuecheck2" required type="text" name="email" placeholder="Email address *">
                    </div>
                    <div class="form-group mb-3">
                        <label>Phone</label>
                        <input class="form-control valuecheck valuecheck2 mobileNumberInput" required type="text" name="mobile" placeholder="Phone *">
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <div class="custom_select">
                                <select name="district" id="district" class="form-control valuecheck" required>
                                    <option value="">Select District*</option>
                                    @foreach(geoData(3) as $data)
                                    <option value="{{$data->id}}" >{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="custom_select">
                                <select name="city" id="city" class="form-control valuecheck" required>
                                    <option value="">Select City*</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Address</label>
                        <input class="form-control valuecheck valuecheck2" required type="text" name="address" placeholder="Address line*">
                    </div>
                    <div class="heading_s1">
                        <h4>Additional information</h4>
                    </div>
                    <div class="form-group mb-0">
                        <textarea rows="5" class="form-control valuecheck2" name="note" placeholder="Order notes"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4 class="">Your Orders</h4>
                    </div>
                    <div class="orderSummryTable">
                        @include(welcomeTheme().'carts.includes.orderSummery')
                    </div>
                    <button type="submit" id="placeOrderBtn" onclick="beginCheckout()" class="btn btn-fill-out btn-block" disabled >Place Order</button>
                    
                    <div class="orderNoteInfo">
                        <p>
                            Your personal data will be used to process your order, support your experience 
                            throughout this website, and for other purposes described in our privacy policy.
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
    </div>
    @else
    <div class="cart_empty">
        <i class="linearicons-cart"></i>
        <h4>Empty Cart</h4>
        <a href="{{route('index')}}" class="btn btn-fill-line rounded-0 view-cart">Shopping</a>
    </div>
    @endif
    @endisset
</div>
<!-- END SECTION SHOP -->


@endsection 

@push('js') 


<script>
$(document).ready(function () {

    function togglePaymentText() {

        $('.payment-text').hide();

        let selectedMethod = $('input[name="payment_option"]:checked').val();

        $('.payment-text[data-method="' + selectedMethod + '"]').slideDown(200);
    }

    // Initial state
    togglePaymentText();

    // On radio change
    $(document).on('change', '.payment-radio', function () {
        togglePaymentText();
    });

});
</script>

<script>

    $(document).ready(function() {
      // Function to check if all input fields are filled
      function checkFields() {
        let allFilled = true;
        
        $('.valuecheck').each(function() {
          if ($(this).val() === '') {
            allFilled = false;
          }
        });
    
        // Enable or disable the button based on all fields being filled
        if (allFilled) {
          $('#placeOrderBtn').prop('disabled', false);
        } else {
          $('#placeOrderBtn').prop('disabled', true);
        }
      }
    
      // Check the fields on keyup event
      $('.valuecheck').on('keyup change', function() {
        checkFields();
      });
    
      // Initial check when the page loads
      checkFields();
    });

    $(document).ready(function(){
        
        $('.selectDateDelivery').change(function(date){
            var dateV =$(this).val();
            var lastDay =3;
            $( "#datepicker" ).datepicker({
            	minDate: +lastDay,
       			maxDate: "+30D"
            });
                
            if(dateV!=''){
                alert(dateV);
            }
                
        });
        
        $("#district").on("change", function(){
                var id = $(this).val();
              if(id==''){
               $('#city').empty().append('<option value="">No City</option>');
              }else{
                  var url = '{{url("/checkout")}}?areaId='+id;
                  $.get(url,function(data){
                    $('#city').empty().append(data.geoData);
                    $('.orderSummryTable').empty().append(data.view);
                  });  
              }
        });
        
        $("#city").on("change", function(){
                var area = $('#district').val();
                var id = $(this).val();
              if(id=='' || area==''){
              //$('#city').empty().append('<option value="">No City</option>');
              }else{
                  var url = '{{url("/checkout")}}?areaId='+area+'&cityId='+id;
                  $.get(url,function(data){
                    $('.orderSummryTable').empty().append(data.view);
                  });  
              }
        });
        
        let typingTimer;
        $(document).on('keyup','.valuecheck2',function(){
            clearTimeout(typingTimer);
            var url ="{{route('incompletedOrder')}}";
            var mobile =$('.mobileNumberInput').val();
            mobile = mobile.replace(/^\+88/, '');
            mobile = mobile.replace(/^88/, '');
            if(mobile.length ==11){
                typingTimer = setTimeout(function () {
                    var data =$(".checkout-form").serialize();
                    $.ajax({
                        url: url,
                        method: "GET",
                        data: data,
                        success: function (res) {
                            console.log(res);
                        }
                    });
                    
                }, 1000);
            }
        });
        
        
        
    });
</script>

@endpush
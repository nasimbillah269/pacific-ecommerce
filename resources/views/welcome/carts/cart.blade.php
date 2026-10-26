@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Cart Items')}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('Cart Items')}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{assetUrl(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('carts')}}" />
<link rel="canonical" href="{{route('carts')}}" />
@endsection @push('css')

<style>

    
    
    
    
    
    
    
    
    /*cart new css start*/
    
    
    /*==========================
 CART PAGE
===========================*/

.shop-table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
}

.shop-table thead tr{
    border-bottom:2px solid #ececec;
}

.shop-table thead th{
    padding:18px 15px;
    font-size:14px;
    text-transform:uppercase;
    color:#111;
    font-weight:500;
    letter-spacing:.5px;
}

.shop-table tbody tr{
    border-bottom:1px solid #efefef;
    transition:.3s;
}

.shop-table tbody tr:hover{
    background:#fafafa;
}

.shop-table td{
    padding: 10px 8px;
    vertical-align:middle;
}

/* Product Image */

.product-thumbnail{
    width:120px;
}

.product-thumbnail figure{
    width:80px;
    height:80px;
    margin:0;
}

.product-thumbnail img{
    width:100%;
    height:100%;
    object-fit:contain;
}

.product-thumbnail .p-relative{
    position:relative;
}

/* Remove Button */

.btn-close{
     position: absolute;
    left: -12px;
    top: 29px;
    width: 14px;
    height: 12px;
    border-radius: 50%;
    border: 1px solid #d9d9d9;
    background: #fff;
    color: #999;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: .3s;
}

.btn-close:hover{
    background:#ff4d4d;
    color:#fff;
    border-color:#ff4d4d;
}

/* Product Name */

.product-name a{
       font-size: 14px;
    font-weight: 500;
    color: #7c7979;
    text-decoration:none;
}

.product-name a:hover{
    color:#00a651;
}

.product-name{
    color:#777;
    line-height:1.8;
}

/* Price */

.product-price,
.product-subtotal{
    font-size: 14px;
    font-weight: 500;
    color:#111;
}

/*==========================
 QUANTITY
===========================*/

.product-quantity .input-group{
    width:125px;
    height:42px;
    border:1px solid #ddd;
    border-radius:30px;
    overflow:hidden;
    display:flex;
    align-items:center;
}

.product-quantity input{
    width:45px;
    border:none;
    text-align:center;
    font-size:16px;
    font-weight:600;
    background:transparent;
    box-shadow:none;
}

.product-quantity input:focus{
    outline:none;
    box-shadow:none;
}

.quantity-minus,
.quantity-plus{
    width: 35px;
    border:none;
    background:#fff;
    font-size:18px;
    cursor:pointer;
    color:#777;
    transition:.3s;
}

.quantity-minus:hover,
.quantity-plus:hover{
    background:#00c853;
    color:#fff;
}

/*==========================
 Continue Shopping
===========================*/

.btn-shopping{
    border: 1px solid #0056d2;
    color: #0056d2;
    background: #fff;
    padding: 6px 20px;
    border-radius: 3px;
    font-weight: 500;
    margin-top: 20px;
    font-size: 14px;
}

.btn-shopping:hover{
    background:#0056d2;
    color:#fff;
}

/*==========================
 Coupon
===========================*/

.coupon{
    margin-top:35px;
    border:1px solid #eee;
    padding:20px;
    border-radius:6px;
}

.coupon-title{
    margin-bottom:15px;
}

.coupon input{
    height:50px;
    border-radius:4px;
    margin-bottom:15px;
}

.coupon button{
    height:50px;
    padding:0 35px;
    background:#111;
    color:#fff;
    border:none;
}

/*==========================
 CART SUMMARY
===========================*/

.cart-summary{
    border:1px solid #ececec;
    padding:30px;
    background:#fff;
}

.cart-title{
       font-size: 14px;
    font-weight: 500;
    text-transform: uppercase;
    margin-bottom:20px;
    border-bottom:2px solid #eee;
    padding-bottom:15px;
}

.cart-subtotal{
    padding:12px 0;
    border-bottom:1px solid #eee;
    font-size:14px;
}

.cart-subtotal label{
    color:#555;
    margin:0;
}

.cart-subtotal span{
    font-weight:500;
    color:#111;
}

.order-total{
    padding:18px 0;
    font-size: 15px;
    font-weight: 500;
}

.order-total span{
    color:#111;
}

/* Checkout Button */

.btn-checkout{
    width:100%;
    margin-top:20px;
    background:#2ecc71;
    color:#fff;
    border:none;
       height: 50px;
    font-size: 15px;
    font-weight: 500;
    border-radius:0;
    transition:.3s;
        display: flex;
    align-items: center;
    justify-content: center;
}

.btn-checkout:hover{
    background:#20b95d;
    color:#fff;
}

/*==========================
 Free Shipping
===========================*/

.freeShipping{
    border:1px solid #d6f5df !important;
    background:#f3fff6 !important;
    border-radius:5px;
}

.freeShipping p{
    margin-bottom:10px;
    color:#28a745;
}

.progress{
    height:8px;
    border-radius:20px;
    overflow:hidden;
}

.progress-bar{
    background:#28a745;
}

/*==========================
 Responsive
===========================*/

@media(max-width:991px){

.shop-table thead{
    display:none;
}

.shop-table,
.shop-table tbody,
.shop-table tr,
.shop-table td{
    display:block;
    width:100%;
}

.shop-table tr{
    margin-bottom:20px;
    border:1px solid #eee;
    padding:15px;
}

.product-thumbnail{
    text-align:center;
}

.product-price,
.product-subtotal,
.product-quantity{
    margin-top:15px;
}

}
    
    
    
    
    .checkout-steps{
    display:flex;
    justify-content:center;
    align-items:center;
    flex-wrap:wrap;
    gap:16px;
    padding:30px 20px;
    font-family:Arial, Helvetica, sans-serif;
}

.step{
    display:flex;
    align-items:center;
    gap:10px;
    color:#c8c8c8;
    font-size:18px;
    font-weight:500;
    text-transform:uppercase;
}

.step.active{
    color:#111;
}

.step-number{
    width:30px;
    height:30px;
    border-radius:50%;
    background:#d4d4d4;
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:16px;
    font-weight:700;
}

.step.active .step-number{
    background:#2ecc71;
}

.step-arrow{
    font-size:34px;
    color:#bdbdbd;
    font-weight:300;
    line-height:1;
}

.step-text{
    white-space:nowrap;
}

@media (max-width:768px){
    
    td.product-subtotal {
    display: none;
}
    
    .checkout-steps{
        gap:6px;
    }

    .step{
        font-size:14px;
    }

    .step-number{
        width:24px;
        height:24px;
        font-size:13px;
    }

    .step-arrow{
        font-size:22px;
    }
    
    .shop-table .product-thumbnail {
        min-width: 74px;
    }
    .product-thumbnail figure {
        width: 45px;
        height: 50px;
    }
    .product-name a {
        font-size: 12px;
    }
    .product-price, .product-subtotal, .product-quantity {
        margin-top: 4px;
    }
    .shop-table tbody tr {
        display: flex;
        padding: 5px;
    }
    .quantity-minus, .quantity-plus {
        width: 20px;
    }
    .product-quantity .input-group {
    width: 86px;
    height: 33px;
    }
    
    .btn-shopping {
        margin-bottom: 20px;
    }
    .checkout-steps {
        padding: 8px 0px;
    }
    
    

}
    
    
    
    
</style>


<script>
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({
        event: "page_view",
        page_category: "page",
        page_title: "Cart View",
        page_url: "{{route('carts')}}"
    });
</script>

@endpush 
@section('contents')

<!-- Start of Page Header -->
{{--<div class="page-header">
    <div class="overlayPageHeaderNew">
        <div class="container">
            <h1 class="page-title mb-0">Cart</h1>
        </div>
    </div>
</div>--}}
<!-- End of Page Header -->

<div class="page-content">
    <div class="container">
        <div class="checkout-steps">

    <div class="step active">
        <span class="step-number">1</span>
        <span class="step-text">SHOPPING CART</span>
    </div>

    <div class="step-arrow">&#8250;</div>

    <div class="step">
        <span class="step-number">2</span>
        <span class="step-text">CHECKOUT DETAILS</span>
    </div>

    <div class="step-arrow">&#8250;</div>

    <div class="step">
        <span class="step-number">3</span>
        <span class="step-text">ORDER COMPLETE</span>
    </div>

</div>
        
        
        @include(welcomeTheme().'.alerts')
        <div class="row gutter-lg mb-10 cartItemsAll">
            @include(welcomeTheme().'carts.includes.cartItems')
        </div>
    </div>
</div>

@endsection @push('js')

<script>
    $(document).ready(function () {
        $(document).on("change", ".cartQtyChange", function () {
            var url = $(this).data("url");
            var qty = $(this).val();
            var Dcharge = parseInt($(".cartDeliveryCharge").text());

            if (isNaN(Dcharge)) {
                Dcharge = 0;
            }

            if (qty == "") {
                qty = 1;
            }

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                cache: false,
                data: { qty: qty },
            })
                .done(function (data) {
                    $(".cartItemsList").empty().append(data.cartItems);
                    $(".headerCartItem").empty().append(data.headerCartItems);
                })
                .fail(function () {
                    // alert("error");
                });
        });
    });
</script>

@endpush
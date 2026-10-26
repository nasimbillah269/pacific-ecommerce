@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{$product->seo_title?:websiteTitle($product->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{$product->seo_title?:websiteTitle($product->name)}}" />
<meta name="description" property="og:description" content="{!!$product->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$product->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{assetUrl($product->image())}}" />
<meta name="url" property="og:url" content="{{route('productView',$product->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('productView',$product->slug?:'no-title')}}" />
@endsection @push('css')

<style>




.product-breadcrumb{
    display:flex;
    flex-wrap:wrap;
    align-items:center;
    gap:6px;
    font-size:14px;
    margin-top: 30px;
    color:#666;
}

.product-breadcrumb a{
    color:#555;
    text-decoration:none;
    transition:.3s;
        font-size: 18px;
}

.product-breadcrumb a:hover{
    color:#0d6efd;
}

.product-breadcrumb .separator{
    color:#999;
}

.product-breadcrumb .current{
    color:#222;
    font-weight:600;
        font-size: 18px;
}


.singlePagePart {
    padding: 25px 0;
}






.orderNoteBox {
    border: 1px solid #ccc;
    padding: 20px;
    margin-top: 20px;
    background-color: #eee;
    text-align: center;
    border-radius: 5px;
}

.orderNoteBox p{
    margin: 0;
    padding: 0;
}

    .btn-wishlist.w-icon-heart.active {
        border-color: unset;
        color: #fff;
        background-color: unset;
    }
    .product-single .singleaddCart.disabled {
        background-color: #444;
        border-color: #444;
        color: #aaa;
        cursor: not-allowed;
    }
    .singleaddCart {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }

    /* Product Variations (Color, Size, and any other attribute group set for this product) */
    .product-variations-wrap {
        margin-bottom: 15px;
    }

    .product-variations-group {
        margin-bottom: 12px;
    }

    .variation-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #292828;
        margin-bottom: 6px;
        text-transform: uppercase;
    }

    .variation-options {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .variation-pill {
        display: inline-block;
        padding: 6px 16px;
        border: 1px solid #d5d0d0;
        border-radius: 20px;
        font-size: 13px;
        color: #292828;
        background: #fff;
        cursor: pointer;
        user-select: none;
        transition: .2s;
    }

    .variation-pill:hover {
        border-color: #005baa;
        color: #005baa;
    }

    .variation-pill.active {
        background: #005baa;
        border-color: #005baa;
        color: #fff;
    }

    .ir {
        text-indent: 100%;
        white-space: nowrap;
        overflow: hidden;
    }

    /**
 * Gallery Styles
 * 1. Enable fluid images
 */
    .gallery {
        overflow: hidden;
    }

    /* Main image hover-zoom (jquery-zoom plugin) */
    .gallery__zoomimg {
        position: relative;
        cursor: pointer;
    }

    .gallery__hero {
        overflow: hidden;
        position: relative;
        margin: 0 0 0.3333333333em;
        background: #fff;
    }
    .is-zoomed .gallery__hero {
        cursor: move;
    }
    .is-zoomed .gallery__hero img {
        max-width: none;
        position: absolute;
        z-index: 0;
        top: -50%;
        left: -50%;
    }

    .gallery__hero-enlarge:hover {
        opacity: 1;
    }

    img.zoomImg:hover {
        cursor: pointer;
    }

    .gallery__thumbs {
        text-align: center;
        background: #fff;
    }
    .gallery__thumbs img {
        margin: 5px 0;
    }
    .gallery__thumbs a {
        display: inline-block;
        width: 20%;
        opacity: 0.75;
        transition: opacity 0.3s cubic-bezier(0.455, 0.03, 0.515, 0.955);
    }
    .gallery__thumbs a:hover {
        opacity: 1;
    }
    .gallery__thumbs a.is-active {
        opacity: 1;
    }

    /* Full Image Lightbox */
    .imageLightbox {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .9);
        z-index: 999999;
        align-items: center;
        justify-content: center;
    }

    .imageLightbox.open {
        display: flex;
    }

    .imageLightbox__close {
        position: absolute;
        top: 15px;
        right: 25px;
        font-size: 40px;
        line-height: 1;
        color: #fff;
        cursor: pointer;
        z-index: 2;
    }

    .imageLightbox__inner {
        width: 90%;
        height: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .imageLightbox__inner img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        cursor: zoom-in;
        transition: transform .25s ease;
        transform: scale(1);
        user-select: none;
    }

    .imageLightbox__inner img.zoomed {
        cursor: zoom-out;
        transform: scale(2.2);
    }

    @media (max-width: 767px) {
        .imageLightbox__inner img.zoomed {
            transform: scale(1.8);
        }
    }

    ol{
        padding-left: 0!important;
    }
    
    .ctgTag span {
        margin-bottom: 10px;
        color: #373535;
        display: block;
        text-transform: none;
        font-size: 16px;
    }
    
    .ctgTag span b {}
    
    .ctgTag span a {
        color: #6f6b6b;
    }
    
    .ctgTag span a:hover {
        color: black;
    }
    
    .ctgTag span a.share {
        margin-right: 5px;
        padding: 2px 5px;
        height: 30px;
        width: 30px;
        display: inline-block;
        border: 1px solid gray;
        text-align: center;
        border-radius: 100%;
    }
    
    .toggleText {
        border-bottom: 1px solid gray;
        margin-bottom: 15px;
    }
    
    .toggleText p {
        margin-bottom: 15px;
    }
    
    .toggleText ul {
        padding-left: 15px;
        margin-bottom: 15px;
    }
    
    .toggleText ul li {
        padding: 5px 0;
    }
    
    @media only screen and (max-width: 767px){
    
        img.zoomImg {
            width: 100% !important;
            height: 100% !important;
        }
    }
    
    
    
    
    
    
    
    
    

.gallery__thumbs .slick-slide {
    padding: 0 5px;
}




.gallery__thumbs .slick-prev,
.gallery__thumbs .slick-next {
    width: 34px;
    height: 34px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 50%;
    z-index: 10;
}

.gallery__thumbs .slick-prev {
    left: -15px;
}

.gallery__thumbs .slick-next {
    right: -15px;
}

.gallery__thumbs .slick-prev:before,
.gallery__thumbs .slick-next:before {
    display: none;
}

.gallery__thumbs .slick-prev i,
.gallery__thumbs .slick-next i {
    color: #333;
    font-size: 18px;
    line-height: 32px;
}
    
    
    
    
    
    .review-section{
    width:100%;
    background:#fff;
    margin:40px auto;
}

/* Tab */
.review-tab{
    border-top:1px solid #e5e5e5;
    text-align:center;
    margin-bottom:35px;
}

.review-tab a{
    display:inline-block;
    padding:14px 18px;
    color:#222;
    text-decoration:none;
    font-size:16px;
    position:relative;
}

.review-tab a.active::before{
    content:"";
    position:absolute;
    top:-1px;
    left:0;
    width:100%;
    height:3px;
    background:#0d6efd;
}

/* Content */

.review-content h3{
       text-align: left;
    font-size: 24px;
    color: #000;
    font-weight: 500;
    padding-bottom: 20px;
    text-transform: uppercase;
}

.no-review{
    font-size:18px;
    color:#333;
    margin-bottom:50px;
}

/* Notice Box */

.review-notice{
    border:2px solid #1a73e8;
    padding:35px;
    font-size:18px;
    color:#222;
    line-height:1.7;
    background:#fff;
}
    .relatedProductPart h4 {
    text-align: left;
    font-size: 24px;
    color: #000;
    font-weight: 500;
    padding-bottom: 20px;
    text-transform: uppercase;
}
    
    
    
    
</style>


<script>

    window.dataLayer = window.dataLayer || [];

    dataLayer.push({
        event: "page_view",
        page_category: "Product Details",
        page_title: "{{$product->name}}",
        page_url: "{{route('productView',$product->slug?:'no-title')}}"
    });
    
    
    dataLayer.push({
        event: "view_item",
        ecommerce: {
            items: [{
                item_id: "{{ $product->id }}",
                item_name: "{{ $product->name }}",
                currency: "{{ general()->currency }}", // Your currency
                item_category: "{!! implode(' - ', $product->productCategories->pluck('name')->toArray()) !!}", // Concatenate categories
                item_brand: "{{ $product->brand ? $product->brand->name : '' }}",
                price: "{{ $product->offerPrice() }}",
                item_variant: "{{ $product->variant ?? '' }}",
            }]
        }
    });
    
    
    function addToCart(product) {
        window.dataLayer = window.dataLayer || [];
        
        var qty = $('#quantity').val() || 0;
        
        dataLayer.push({
            event: "add_to_cart",
            ecommerce: {
                items: [{
                    item_id: product.id,
                    item_name: product.name,
                    item_category: product.category_name,
                    price: product.final_price,
                    quantity: parseInt(qty, 10)
                }]
            }
        });
    }
    
    
</script>

@endpush @section('contents')

<!-- Start of Page Header -->
{{--<div class="page-header" style="background-image: url({{assetUrl($product->image())}}); background-position: center; background-size: cover; background-repeat: no-repeat;">
    <div class="overlayPageHeaderNew">
        <div class="container">
            <h1 class="page-title mb-0">{{$product->name}}</h1>
        </div>
    </div>
</div>--}}
<!-- End of Page Header -->

<div class="product-breadcrumb">
    <div class="container">
    <a href="{{ url('/') }}">Home</a>

    @if($product->productCategories->count() > 0)
        @foreach($product->productCategories as $ctg)
            <span class="separator">/</span>
            <a href="{{ route('productCategory', $ctg->slug ?: 'no-title') }}">
                {{ $ctg->name }}
            </a>
        @endforeach
    @endif

    <span class="separator">/</span>
    <span class="current">{{ $product->name }}</span>
    </div>
</div>


<div class="singlePagePart">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="singleProductLeftGrid">
                    <!-- Gallery -->
                    <div id="js-gallery" class="gallery">
                        <!--Gallery Hero-->
                        <div class="gallery__zoomimg">
                            <img  id="mainProductImage" src="{{assetUrl($product->image())}}" alt="{{$product->name}}" />
                        </div>
                        <!--Gallery Hero-->

                        <!--Gallery Thumbs-->
                        <div class="gallery__thumbs">
                            @foreach($product->galleryFiles as $file)
                            <a href="{{assetUrl($file->image())}}" data-gallery="thumb">
                                <img src="{{assetUrl($file->image())}}" />
                            </a>
                            @endforeach
                        </div>
                        <!--Gallery Thumbs-->
                    </div>
                </div>
            </div>

            <!-- Full Image Lightbox (click main image to open, click image to zoom in/out) -->
            <div id="imageLightbox" class="imageLightbox">
                <span class="imageLightbox__close">&times;</span>
                <div class="imageLightbox__inner">
                    <img id="imageLightboxImg" src="" alt="{{$product->name}}" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="singlePrductInfoGrid">
                    <h2>{{$product->name}}</h2>
                
                    <p class="SingleProcutprice">
                        <span> {{priceFullFormat($product->offerPrice())}} @if($product->regular_price > $product->offerPrice())<del>{{priceFullFormat($product->regular_price)}}</del>@endif</span> 
                        
                        @if($product->regular_price > $product->offerPrice())
                        <span class="saveTk">Save {{priceFormat($product->regular_price - $product->offerPrice())}} BDT</span>
                        @endif
                    </p>
                    
                    <h6 class="stockReady">Availability: <span class="stock">In Stock</span></h6>
                    <!--<p>-->
                    <!--    {!!$product->short_description!!}-->
                    <!--</p>-->
                    
                    <div class="whatsappLin">
                        <a href="https://wa.me/8801722955573"><i class="fa-brands fa-whatsapp"></i> WhatsApp Inquiry</a>
                    </div>
                    
                    @include(welcomeTheme().'.alerts')
                    <form action="{{route('addToCart',$product->id)}}" class="singleForm" method="post">
                        @csrf

                        @if($product->productAttibutes->count() > 0)
                        <div class="product-variations-wrap">
                            @foreach($product->productAttibutes->groupBy('reff_id') as $groupId => $groupItems)
                            @php
                                $groupName = optional($groupItems->first()->attribute)->name;
                                $fieldName = $groupId == 68 ? 'color' : ($groupId == 73 ? 'size' : 'attribute_'.$groupId);
                                $firstItem = $groupItems->first();
                            @endphp
                            @if($groupName)
                            <div class="product-variations-group" data-group-id="{{ $groupId }}">
                                <label class="variation-label">{{ $groupName }}</label>
                                <div class="variation-options">
                                    @foreach($groupItems as $item)
                                    @continue(!$item->attributeItem)
                                    <span class="variation-pill @if($loop->first) active @endif" data-id="{{ $item->parent_id }}">{{ $item->attributeItem->name }}</span>
                                    @endforeach
                                </div>
                                <input type="hidden" name="{{ $fieldName }}" class="variation-input" value="{{ $firstItem->attributeItem ? $firstItem->parent_id : '' }}">
                            </div>
                            @endif
                            @endforeach
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-4 col-md-3">
                                <div class="quntity" style="margin-bottom: 0;">
                                    <!--<span>Quantity</span>-->
                                    <button class="dcrementBtn" id="decrement">-</button>
                                    <input id="quantity" name="quantity" type="text" inputmode="numeric" pattern="[0-9]*" autocomplete="off" value="1" />
                                    <button class="incrementBtn" id="increment">+</button>
                                </div>
                               
                            </div>
                            <div class="col-8 col-md-5">
                                <button type="button" name="orderNow" value="cart" onclick="addToCart({{ json_encode($product) }})" data-url="{{route('addToCart',$product->id)}}" class="btnAddToCart singleaddCart addTo">Add to cart</button>
                            </div>
                            <!--<div class="col-md-12">-->
                            <!--    <button type="button" name="orderNow" value="checkout" onclick="addToCart({{ json_encode($product) }})" data-url="{{route('addToCart',$product->id)}}" class="btnAddToCart singleaddCart">Buy Now</button>-->
                            <!--</div>-->
                        </div>
                    </form>
                    
                    <div class="productViewCount">
                        <p> <i class="fa fa-eye"></i> 1 user are viewing this product</p>
                    </div>
                    
                    {{--<div class="productAccroMain">
                        <div class="toggle-section">
                            
                            <div class="toggleButton" style="border-top: 1px solid #000; padding-top: 20px;">
                                <div class="toggleTop">
                                    <div class="toggleInfoIcon"><i class="fa fa-file-o" aria-hidden="true"></i></div>
                                    <div class="toggleTitle">
                                        <h3 class="toggle-heading">Product Description </h3>
                                        <p>🔍See our product description</p>
                                    </div>
                                </div>
                                <div><span class="icon">+</span></div>
                            </div>
                            
                          <div class="toggle-content" style="border-bottom: 1px solid gray;margin-bottom: 15px;">
                            <p>
                                 {!!$product->description!!}
                            </p>
                          </div>
                          
                            <div class="toggleButton">
                                <div class="toggleTop">
                                    <div class="toggleInfoIcon"><i class="fa fa-question-circle-o" aria-hidden="true"></i></div>
                                    <div class="toggleTitle">
                                        <h3 class="toggle-heading">Why choose  AJL Sea Food. </h3>
                                        <p>🛍️ The Ultimate Shopping Destination!</p>
                                    </div>
                                </div>
                                <div><span class="icon">+</span></div>
                            </div>
                            
                          <div class="toggle-content toggleText">
                            <p>
                            A.J.L Sea Food is one of the most trusted and premium seafood suppliers in Dhaka city. We offer 50+ types of locally sourced, fresh sea food—including Lobster, Octopus, Squid, Pomfret, Shrimp, Red Snapper, Crab, Shellfish, and more—preserved using an advanced hygienic frozen system to retain full taste and nutrition.
                            </p>
                            
                            What Makes Us Special:
                            <ul>
                                <li>
                                    ✅ 100% Fresh & Hygienic – Restaurant and export-grade quality
                                </li>
                                <li>
                                    ✅ Cash on Delivery in Dhaka City – Pay only after receiving your order
                                </li>
                                <li>
                                    ✅ Nationwide Delivery – For outside Dhaka, pay courier charge in advance and enjoy COD for the fish
                                </li>
                                <li>
                                    ✅ Reliable Home Delivery Service – Accepting orders 24/7
                                </li>
                                <li>
                                    ✅ Exclusive Shellfish Collection – Rare items even not found in Cox’s Bazar
                                </li>
                                <li>
                                    ✅ 5+ Years of Experience – Backed by 10 thousands + of happy customers
                                </li>
                            </ul>
                            <p>
                                A.J.L Sea Food brings premium-quality seafood right to your kitchen – with no compromise on freshness, hygiene, or taste. Perfect for health-conscious food lovers and seafood enthusiasts alike.
                            </p> 
                           <p>
                               📞 Order Now: ajlseafoodbd.com
                               <br>
                               📦 Safe, fresh, and hassle-free seafood delivery – straight to your doorstep.
                           </p> 
                           
                          </div>
                          
                            <div class="toggleButton">
                                <div class="toggleTop">
                                    <div class="toggleInfoIcon"><i class="fa fa-refresh" aria-hidden="true"></i></div>
                                    <div class="toggleTitle">
                                        <h3 class="toggle-heading">Our return policy</h3>
                                        <p>🚚D elivery & Return Policy</p>
                                    </div>
                                </div>
                                <div><span class="icon">+</span></div>
                            </div>
                            
                          <div class="toggle-content toggleText">
                            <p>
                            At A.J.L Sea Food, customer satisfaction is our top priority. We maintain strict hygiene and quality standards to ensure you receive the freshest and safest sea food. However, in rare cases where there’s an issue, we offer a simple and fair Return & Replacement Policy:
                            </p>

                            ✅ Applicable Conditions:
                            <ul>
                                <li>
                                    If your delivered item is damaged, spoiled, or incorrect, please report it within 30 mins of delivery.
                                </li>
                                <li>
                                    You must provide photo/video proof via WhatsApp or Messenger at the time of delivery or shortly after.
                                </li>
                                <li>
                                    Returns are only accepted at the time of delivery. Once accepted by the customer, products are considered final due to the perishable nature of sea food.
                                </li>
                            </ul>
                            <p>
                                For courier deliveries outside Dhaka, we do not offer return but may offer partial refund or credit if the issue is valid and reported immediately with proof.
                            </p>
                            <span>
                            🔁 Replacement Process:
                            </span>
                            <p>
                            Contact our support team: +880 1333-153011
                            </p>
                            <p>
                            Share order ID, issue details, and photos/videos.
                            </p>
                            <p>
                            If valid, we will send a replacement or issue store credit as soon as possible.
                            </p>
                          </div>
                                                    
                            <div class="toggleButton">
                                <div class="toggleTop">
                                    <div class="toggleInfoIcon"><i class="fa fa-star-o" aria-hidden="true"></i></div>
                                    <div class="toggleTitle">
                                        <h3 class="toggle-heading">Customer Reviews</h3>
                                        <p>🎉 3,00,000+ 😍 Happy Customers & ⭐⭐⭐⭐⭐ Reviews! 🚀</p>
                                    </div>
                                </div>
                                <div><span class="icon">+</span></div>
                            </div>
                            
                            <div class="toggle-content">
                                <p>
                              At AZL Sea Food, customer satisfaction is our top priority. We are committed to delivering high-quality, fresh seafood every time. However, if you are not completely satisfied with your order, please review our return policy below:

                                ✅ Returns & Replacements
                                Due to the perishable nature of seafood, returns are only accepted if the product is damaged, spoiled, or incorrect at the time of delivery.
                                
                                Customers must notify us within 24 hours of receiving the order to be eligible for a return or replacement.
                                
                                To process a return, please provide clear photos of the product and a brief explanation of the issue.
                                
                                ✅ Refunds
                                If a return is approved, you may choose between a full refund or a replacement item.
                                
                                Refunds are processed within 5–7 business days to your original payment method.
                                
                                ✅ Non-Returnable Items
                                Products that were delivered in good condition and match the order are not eligible for return or refund.
                                
                                We do not accept returns for change of mind after delivery.
                                
                                ✅ How to Request a Return
                                Contact our customer service at [your phone number/email] within 24 hours.
                                
                                Provide your order number, photos, and reason for the return.
                                
                                Wait for confirmation and return instructions.
                                
                                We thank you for trusting AZL Sea Food. Your satisfaction and trust mean everything to us.


                                </p>
                            </div>
                           
                          
                        </div>
                    </div>--}}
                    
                    <div>
                        <p class="ctgTag">
                            
                            @if($product->productCategories->count()  > 0)
                            <span class="ppinfo" style="border-top: 1px dotted lightgray;">
                            <b>Category:</b> @foreach($product->productCategories as $i=>$ctg){{$i==0?'':','}} <a href="{{route('productCategory',$ctg->slug?:'no-title')}}">{{$ctg->name}} </a> @endforeach
                            </span>
                            @endif
                            
                            @if($product->productTags->count() > 0)
                            <span class="ppinfo" style="border-top: 1px dotted lightgray;">
                            <b>Tag: </b> @foreach($product->productTags as $i=>$ptag) @if($tag =$ptag->attribute) {{$i==0?'':','}} {{$tag->name}} @endif @endforeach
                            </span>
                            @endif
                            
                            @if($product->productTags->count() > 0)
                            <span class="ppinfo" style="border-top: 1px dotted lightgray;">
                            <b>Brands: </b> @foreach($product->productTags as $i=>$ptag) @if($tag =$ptag->attribute) {{$i==0?'':','}} {{$tag->name}} @endif @endforeach
                            </span>
                            @endif
                            
                            {{--<span>
                                <b>Share: </b> 
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url(route('productView', $product->slug ?: 'no-title')) }}" target="_blank" class="share"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/intent/tweet?url={{ url(route('productView', $product->slug ?: 'no-title')) }}&text={{ urlencode($product->name) }}" target="_blank" class="share"><i class="fa fa-twitter"></i></a>
                                <a href="https://pinterest.com/pin/create/button/?url={{ url(route('productView', $product->slug ?: 'no-title')) }}&media={{assetUrl($product->image())}}&description={{ urlencode($product->name) }}" target="_blank" class="share"><i class="fa fa-pinterest"></i></a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url(route('productView', $product->slug ?: 'no-title')) }}&title={{ urlencode($product->name) }}" target="_blank" class="share"><i class="fa fa-linkedin"></i></a>
                                <a href="https://wa.me/?text={{ urlencode($product->name . ' : ' . url(route('productView', $product->slug ?: 'no-title'))) }}" target="_blank" class="share"><i class="fa fa-whatsapp"></i></a>
                            </span>--}}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="pRview" style="display: none;">
<div class="container">
    <div class="review-section">

    <!-- Tab -->
    <div class="review-tab">
        <a href="#" class="active">Reviews (0)</a>
    </div>

    <!-- Content -->
    <div class="review-content">
        <h3>Reviews</h3>

        <p class="no-review">
            There are no reviews yet.
        </p>

        <div class="review-notice">
            Only logged in customers who have purchased this product may leave a review.
        </div>
    </div>

</div>
</div>
</div>

{{--<div class="singleProductDescriptionPart">
    <div class="container">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    Description
                </button>
            </li>
            <!--<li class="nav-item" role="presentation">-->
            <!--    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">-->
            <!--        Additional Information-->
            <!--    </button>-->
            <!--</li>-->
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="productImg">
                            <img src="{{assetUrl($product->image())}}" alt="AJL Sea Food" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="productInfo">
                            <h4>Product information</h4>
                            <p>
                                {!!$product->description!!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="addtionalInfo">
                    <p>
                        
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</div>--}}

<!-- related product start -->
<div class="relatedProductPart">
    <div class="container">
        <h4>Related Products</h4>

        <div class="row">
            @foreach($relatedProducts as $product)
            <div class="col-md-3 col-6 col-lg-2" style="padding: 0 10px;">
                @include(welcomeTheme().'products.includes.productCard')
            </div>
            @endforeach
        </div>
        
    </div>
</div>
<!-- related product end -->

@endsection @push('js')

<script>
    $(document).ready(function() {
        function formatDate(date) {
            var day = date.getDate();
            var month = date.getMonth() + 1; // Months are zero-based
            var year = date.getFullYear();
            
            // Add leading zero for single digit months and days
            if (day < 10) day = '0' + day;
            if (month < 10) month = '0' + month;
            
            return day + '/' + month + '/' + year;
        }

        function displayFutureDates() {
            var today = new Date();
            const currentHour = today.getHours();
            // Calculate dates 4 and 5 days from today
            if (currentHour < 12) {
                var date4DaysFromNow = new Date(today);
                date4DaysFromNow.setDate(today.getDate() + 1);
        
                var date5DaysFromNow = new Date(today);
                date5DaysFromNow.setDate(today.getDate() + 2);
            } else {
                var date4DaysFromNow = new Date(today);
                date4DaysFromNow.setDate(today.getDate() + 2);
        
                var date5DaysFromNow = new Date(today);
                date5DaysFromNow.setDate(today.getDate() + 3);
            }
        
            // Format dates
            var formattedDate4DaysFromNow = formatDate(date4DaysFromNow);
            var formattedDate5DaysFromNow = formatDate(date5DaysFromNow);
        
            // Display dates
            $("#dates").html("<b>" + formattedDate4DaysFromNow + "</b> & " + "<b>" + formattedDate5DaysFromNow + "</b>");
        }
        
        displayFutureDates();
    });
</script>

<script>
    $(document).ready(function() {
        function updateCountdown() {
            var now = new Date();
            var targetTime = new Date();
            
            // Set target time to 12 PM of the current day
            targetTime.setHours(12, 0, 0, 0);

            // If it's already past 12 PM, set target time to 12 PM of the next day
            if (now.getTime() > targetTime.getTime()) {
                targetTime.setDate(targetTime.getDate() + 1);
            }

            var timeDifference = targetTime - now;
            var hours = Math.floor(timeDifference / (1000 * 60 * 60));
            var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));

            $('#countdown').text(hours + ' hours ' + minutes + ' minutes');
        }

        // Update the countdown every minute
        updateCountdown();
        setInterval(updateCountdown, 60000);
    });
</script>

<script>

// Hover-zoom on the main product image (jquery-zoom plugin). Re-callable so
// it can be re-initialized every time the main image's src changes (thumbnail
// click), otherwise the zoom lens keeps showing whichever image was on the
// page when .zoom() first ran.
// Zoom level is capped at ZOOM_SCALE x the displayed box width, because the
// plugin otherwise zooms to the image's full natural size (far too close on
// large product photos).
var ZOOM_SCALE = 1.6;
function initMainImageZoom(){
    if ($(window).width() > 768 && $.fn.zoom) {
        var $box = $('.gallery__zoomimg');
        var img = $box.find('img').not('.zoomImg').get(0);
        if (!img) return;
        if (!img.complete || !img.naturalWidth) {
            $(img).one('load', initMainImageZoom);
            return;
        }
        var magnify = Math.min(1, ($box.width() * ZOOM_SCALE) / img.naturalWidth);
        $box.find('img').trigger('zoom.destroy');
        $box.zoom({ cursor: 'pointer', magnify: magnify });
    }
}

initMainImageZoom();

    $(document).ready(function(){

        // Product variation pills (Color, Size, and any other attribute group
        // configured for this product in the admin). The first item in every
        // group is pre-selected on page load, so Add to Cart is always ready
        // to use - clicking a pill just swaps the selection within its group.
        $(document).on('click', '.variation-pill', function (e) {
            e.preventDefault();
            var $pill = $(this);
            var $group = $pill.closest('.product-variations-group');

            $group.find('.variation-pill').removeClass('active');
            $pill.addClass('active');
            $group.find('.variation-input').val($pill.data('id'));
        });

        $(document).on("click", ".singleaddCart:not(.disabled)", function (e) {

            var that =$(this);
            var url = that.attr("data-url");

            var data = $('.singleForm').serialize();
            $('.alert-cart-product').remove();

            $.ajax({
                url: url,
                method: "POST",
                data: data,
                beforeSend: function() {
                    $(that).find('.load-more-overlay').removeClass('loading');
                },
            })
            .done(function (data) {
                $('.mobile-menu-side-modals').addClass('open-side');
                $("body").css('overflow-y','hidden');
                $(that).find('.load-more-overlay').removeClass('loading');
                $(".cart-count").empty().append(data.cartCount);
                $(".cartAreaSection").empty().append(data.cartItem);
                $(".cartAreaSection2").empty().append(data.cartItem2);
            })
            .fail(function () {
                $(that).removeClass('load-more-overlay loading');
                // location.reload(true);
            });

        });
    });
</script>


<script>
    $(document).ready(function () {

    $('.gallery__thumbs').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: false,
        speed: 400,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });

});
</script>

<script>
    $(document).ready(function () {

    // First thumbnail active
    $('.gallery__thumbs a:first').addClass('is-active');

    // Click thumbnail
    $('.gallery__thumbs').on('click', 'a', function(e){
        e.preventDefault();

        // Remove previous active
        $('.gallery__thumbs a').removeClass('is-active');

        // Add active class
        $(this).addClass('is-active');

        // Get clicked image
        var img = $(this).attr('href');

        // Fade effect
        $('#mainProductImage').fadeOut(150, function () {
            $(this).attr('src', img).fadeIn(150, function(){
                // Main image changed - re-init hover zoom so it zooms into the new image
                initMainImageZoom();
            });
        });
    });

});
</script>

<script>
    $(document).ready(function () {

        // Click the main image -> open it full-size in a lightbox.
        // Bound to the wrapping container (not the <img> itself) because the
        // zoom plugin overlays its own zoomed <img> on top while hovering,
        // which would otherwise swallow the click before it reaches #mainProductImage.
        $(document).on('click', '.gallery__zoomimg', function(e){
            e.preventDefault();
            var src = $('#mainProductImage').attr('src');
            $('#imageLightboxImg').attr('src', src).removeClass('zoomed');
            $('#imageLightbox').addClass('open');
            $('body').addClass('overflow-hidden');
        });

        // Click the lightbox image -> zoom in centered on the click point, click again to zoom out
        $(document).on('click', '#imageLightboxImg', function(e){
            e.stopPropagation();
            var $img = $(this);

            if($img.hasClass('zoomed')){
                $img.removeClass('zoomed');
            }else{
                var offset = $img.offset();
                var x = ((e.pageX - offset.left) / $img.outerWidth()) * 100;
                var y = ((e.pageY - offset.top) / $img.outerHeight()) * 100;
                $img.css('transform-origin', x + '% ' + y + '%');
                $img.addClass('zoomed');
            }
        });

        function closeImageLightbox(){
            $('#imageLightbox').removeClass('open');
            $('#imageLightboxImg').removeClass('zoomed').attr('src', '');
            $('body').removeClass('overflow-hidden');
        }

        $(document).on('click', '.imageLightbox__close', closeImageLightbox);

        // Click the dark overlay (outside the image) -> close
        $(document).on('click', '#imageLightbox', function(e){
            if(e.target.id === 'imageLightbox'){
                closeImageLightbox();
            }
        });

        // Esc key -> close
        $(document).on('keyup', function(e){
            if(e.key === 'Escape'){
                closeImageLightbox();
            }
        });

    });
</script>


@endpush
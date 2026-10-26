@extends(welcomeTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle()}}</title>
@endsection 
@section('SEO')
<meta name="title" property="og:title" content="{{general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{assetUrl(general()->favicon())}}" />
<meta name="url" property="og:url" content="{{route('index')}}" />
<link rel="canonical" href="{{route('index')}}">
@endsection 
@push('css')
<script type="application/ld+json">
    { 
    "@context": "https://schema.org", 
    "@type": "WebPage", 
    "url": "{{route('index')}}", 
    "name": "{{websiteTitle()}}",
    "author": {
        "@type": "Webpage",
        "name": "{{websiteTitle()}}"
    },
    "description": "{!!general()->meta_description!!}"
    }
</script>


<script>
        
      
            window.dataLayer = window.dataLayer || [];
    
            dataLayer.push({
                event: "page_view",
                page_category: "Homepage",
                page_title: "{{websiteTitle()}}",
                page_url: "{{route('index')}}"
            });
    
            
            // dataLayer.push({
            //     event: "view_item_list",
            //     ecommerce: {
            //         items: [
            //             @foreach($mostSalesCollection as $index => $product)
            //             {
            //                 item_id: "{{ $product->id }}",
            //                 item_name: "{{ $product->name }}",
            //                 currency: "{{general()->currency}}",
            //                 item_category: "{!! implode(' - ', $product->productCategories->pluck('name')->toArray()) !!}", // Concatenate categories
            //                 item_brand: "{{ $product->brand?$product->brand->name:'' }}",
            //                 price: "{{ $product->offerPrice() }}",
            //                 quantity: "{{ $product->quantity?:9999}}",
            //                 index: "{{ $index + 1 }}" // Index starts at 1
            //             }@if(!$loop->last),@endif
            //             @endforeach
            //         ]
            //     }
            // });


    
        function addToCart(product) {
            window.dataLayer = window.dataLayer || [];
            dataLayer.push({
                event: "add_to_cart",
                ecommerce: {
                    items: [{
                        item_id: product.id,
                        item_name: product.name,
                        item_category: product.category_name,
                        price: product.final_price,
                        quantity: 1
                    }]
                }
            });
        }
    
    
</script>

<style>
    
    .categoryTab .row{
        margin:0 -10px;
    }
    
    .categoryTab .row .col-md-3{
        padding: 10px;
    }
    @media only screen and (max-width: 767px){
       .categoryTab .row{
            margin:0 -5px;
        }
        
        .categoryTab .row .col-md-3{
            padding: 5px;
        } 
    }
</style>



@endpush 

@section('contents')

@include(welcomeTheme().'layouts.slider')

<!-- product category section start -->
<div class="productCategoryPart" style="padding-top: 20px;">
    <div class="container">
        <!--<p>Our Products</p>-->
        <h4 style="padding-bottom:0;">Our Products</h4>
        <div class="categoryTab">
            <div class="row mt-4 mb-5">
                @foreach($featuredCollection as $product)
                <div class="col-md-3 col-6">
                    @include(welcomeTheme().'.products.includes.productCard')
                </div>
                @endforeach
            </div>
            <a href="https://ajlseafoodbd.com/product/category/all-sea-foods" class="allProBtn">All Products</a>
        </div>
    </div>
</div>
<!-- product category section end -->

<!-- product banner section start -->
<div class="productBannerPart">
    <div class="container">
        <div class="row">
            @foreach($offerBanners as $i=>$offerBanner)
            @if($i==0)
            <div class="col-md-5">
                <div class="productBannerSmallGrid">
                    <div class="productBannerBgImg" style="background-image: url({{assetUrl($offerBanner->image())}});">
                        <div class="productBannerContent">
                            <h5>{{$offerBanner->name}}</h5>
                            <p>{{$offerBanner->content}}</p>
                            <a href="{{$offerBanner->banner_link}}">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($i==1)
            <div class="col-md-7">
                <div class="productBannerLeargGrid">
                    <div class="productBannerBgImg bg2" style="background-image: url({{assetUrl($offerBanner->image())}});">
                        <div class="productBannerContent">
                            <h5>{{$offerBanner->name}}</h5>
                            <p>{{$offerBanner->content}}</p>
                            <a href="{{$offerBanner->banner_link}}">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($i==2)
            <div class="col-md-7">
                <div class="productBannerLeargGrid">
                    <div class="productBannerBgImg bg3" style="background-image: url({{assetUrl($offerBanner->image())}});">
                        <div class="productBannerContent">
                            <h5>{{$offerBanner->name}}</h5>
                            <p>{{$offerBanner->content}}</p>
                            <a href="{{$offerBanner->banner_link}}">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($i==3)
            <div class="col-md-5">
                <div class="productBannerSmallGrid">
                    <div class="productBannerBgImg" style="background-image: url({{assetUrl($offerBanner->image())}});">
                        <div class="productBannerContent">
                            <h5>{{$offerBanner->name}}</h5>
                            <p>{{$offerBanner->content}}</p>
                            <a href="{{$offerBanner->banner_link}}">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
<!-- product banner section end -->

<!-- best seller product section start -->
<div class="bestSellerProductPart">
    <div class="sectionBgImg" style="background-image: url({{assetUrl('welcome/images/bg-bestseller.jpg')}});">
        <div class="overly">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bestSellerLeftGrid">
                            <!--<img src="{{assetUrl('welcome/images/Untitled design.jpg')}}" alt="AJL Sea Food" />-->
                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/f1GyVt07WDI?si=i6b4ALtH9K6-mUGv" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bestSellerRightGrid">
                            <p>Our Products</p>
                            <h5>Best Sale</h5>
                            <div class="row">
                                @foreach($mostSalesCollection as $saleProduct)
                                <div class="col-md-6">
                                    <div class="newProductRow">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="bestSellerGrid">
                                                    <img src="{{assetUrl($saleProduct->image())}}" alt="{{$saleProduct->name}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="bestSellerGrid">
                                                    <h6><a href="{{route('productView',$saleProduct->slug?:Str::slug($saleProduct->name))}}">{{Str::limit($saleProduct->name,15)}}</a></h6>
                                                    <div class="rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                    <p class="price"><span>
                                                        @if($saleProduct->regular_price > $saleProduct->offerPrice())<del>{{priceFormat($saleProduct->regular_price)}}</del>@endif
                                                        {{priceFullFormat($saleProduct->offerPrice())}} / kg
                                                    </span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- best seller product section end -->

<!-- buiness info section start -->
<div class="buinessInfoPart">
    <div class="buinessInfoSectionBgImg" style="background-image: url({{assetUrl('welcome/images/bg-service.jpg')}});">
        <div class="bgOverly">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="buinessInfoGrid">
                            <img src="{{assetUrl('welcome/images/3280126.png')}}" alt="AJL Sea Food" />
                            <h5>Choose Items</h5>
                            <p>
                                Select from a wide range of fresh seafood, carefully sourced and ready to meet your culinary needs.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="buinessInfoGrid">
                            <img src="{{assetUrl('welcome/images/icon-02-1.png')}}" alt="AJL Sea Food" />
                            <h5>Place Your Address</h5>
                            <p>
                                Provide your delivery details, and we’ll ensure your order reaches you fresh and on time.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="buinessInfoGrid">
                            <img src="{{assetUrl('welcome/images/paymzent.png')}}" alt="AJL Sea Food" />
                            <h5>Payment & Delivery</h5>
                            <p>
                                Pay delivery charge to confirm & enjoy cash on delivery service right at your doorstep.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- buiness info section end -->

<!-- letest blog section part start -->
<div class="latestBlogPart">
    <div class="container">
        <span>Our Blogs</span>
        <h4>Latest Blogs</h4>
        <div class="row">
            @foreach($latestPosts as $post)
            <div class="col-md-4">
                @include(welcomeTheme().'blogs.includes.blogGrid')
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- letest blog section part end -->

<!-- brand section start -->
<div class="brandPart">
    <div class="container">
        <ul>
            <li>
                <img src="{{assetUrl('welcome/images/brand-01.png')}}" alt="AJL Sea Food" />
            </li>
            <li>
                <img src="{{assetUrl('welcome/images/brand-02.png')}}" alt="AJL Sea Food" />
            </li>
            <li>
                <img src="{{assetUrl('welcome/images/brand-03.png')}}" alt="AJL Sea Food" />
            </li>
            <li>
                <img src="{{assetUrl('welcome/images/brand-04.png')}}" alt="AJL Sea Food" />
            </li>
            <li>
                <img src="{{assetUrl('welcome/images/brand-05.png')}}" alt="AJL Sea Food" />
            </li>
        </ul>
    </div>
</div>
<!-- brand section end -->

@endsection @push('js') @endpush
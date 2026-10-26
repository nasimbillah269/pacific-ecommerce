@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{$page->seo_title?:websiteTitle($page->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{$page->seo_title?:websiteTitle($page->name)}}" />
        <meta name="description" property="og:description" content="{!!$page->seo_description?:general()->meta_description!!}" />
        <meta name="keywords" content="{{$page->seo_keyword?:general()->meta_keyword}}" />
        <meta name="image" property="og:image" content="{{assetUrl($page->image())}}" />
        <meta name="url" property="og:url" content="{{route('pageView',$page->slug?:'no-title')}}" />
        <link rel="canonical" href="{{route('pageView',$page->slug?:'no-title')}}">
@endsection @push('css')
<style>
	
</style>
<script>
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({
        event: "page_view",
        page_category: "latest Product",
        page_title: "{{$page->name}}",
        page_url: "{{route('pageView',$page->slug?:'no-title')}}"
    });
    
    // dataLayer.push({
    //     event: "view_item_list",
    //     ecommerce: {
    //         items: [
    //             @foreach($products as $index => $product)
    //             {
    //                 item_id: "{{ $product->id }}",
    //                 item_name: "{{ $product->name }}",
    //                 currency: "{{general()->currency}}",
    //                 item_category: "{!! implode(' - ', $product->productCategories->pluck('name')->toArray()) !!}", // Concatenate categories
    //                 item_brand: "{{ $product->brand?$product->brand->name:'' }}",
    //                 price: "{{ $product->offerPrice() }}",
    //                 quantity: "{{ $product->quantity?:999}}",
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
@endpush 

@section('contents')


<div class="breadcrumb_section bg_gray page-title-mini">
     <div class="container"><!-- STRART CONTAINER -->
         <div class="row align-items-center">
        	 <div class="col-md-6">
                 <div class="page-title">
            		 <h1>{{$page->name}}</h1>
                 </div>
             </div>
             <div class="col-md-6">
                 <ol class="breadcrumb justify-content-md-end">
                     <li class="breadcrumb-item"><a href="{{route('index')}}">Home </a></li>
                     <li class="breadcrumb-item active">{{$page->name}}</li>
                 </ol>
             </div>
         </div>
     </div>
     <!-- END CONTAINER-->
 </div>

 <div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row shop_container grid">
                    @foreach($products as $product)
                    <div class="col-md-4 col-6" style="padding: 0 10px;">
                        @include(welcomeTheme().'.products.includes.productCard')
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        {{$products->links('pagination')}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                <div class="sidebar">
                    <div class="widget">
                        <h5 class="widget_title">Categories </h5>
                        <ul class="widget_categories">
                            <li><a href="#"><span class="categories_name">Women </span><span class="categories_num">(9) </span></a></li>
                            <li><a href="#"><span class="categories_name">Top </span><span class="categories_num">(6) </span></a></li>
                            <li><a href="#"><span class="categories_name">T-Shirts </span><span class="categories_num">(4) </span></a></li>
                            <li><a href="#"><span class="categories_name">Men </span><span class="categories_num">(7) </span></a></li>
                            <li><a href="#"><span class="categories_name">Shoes </span><span class="categories_num">(12) </span></a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Filter </h5>
                        <div class="filter_price">
                             <div id="price_filter" data-min="0" data-max="500" data-min-value="50" data-max-value="300" data-price-sign="$" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 10%; width: 50%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 10%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 60%;"></span></div>
                             <div class="price_range">
                                 <span>Price:  <span id="flt_price">$50 - $300</span></span>
                                 <input type="hidden" id="price_first">
                                 <input type="hidden" id="price_second">
                             </div>
                         </div>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Brand </h5>	
                        <ul class="list_brand">
                            <li>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="Arrivals" value="">
                                    <label class="form-check-label" for="Arrivals"><span>New Arrivals </span></label>
                                </div>
                            </li>
                            <li>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="Lighting" value="">
                                    <label class="form-check-label" for="Lighting"><span>Lighting </span></label>
                                </div>
                            </li>
                            <li>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="Tables" value="">
                                    <label class="form-check-label" for="Tables"><span>Tables </span></label>
                                </div>
                            </li>
                            <li>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="Chairs" value="">
                                    <label class="form-check-label" for="Chairs"><span>Chairs </span></label>
                                </div>
                            </li>
                            <li>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="Accessories" value="">
                                    <label class="form-check-label" for="Accessories"><span>Accessories </span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Size </h5>
                        <div class="product_size_switch">
                            <span>xs </span>
                            <span>s </span>
                            <span>m </span>
                            <span>l </span>
                            <span>xl </span>
                            <span>2xl </span>
                            <span>3xl </span>
                        </div>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Color </h5>
                        <div class="product_color_switch">
                            <span data-color="#87554B" style="background-color: rgb(135, 85, 75);"></span>
                            <span data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
                            <span data-color="#DA323F" style="background-color: rgb(218, 50, 63);"></span>
                            <span data-color="#2F366C" style="background-color: rgb(47, 54, 108);"></span>
                            <span data-color="#B5B6BB" style="background-color: rgb(181, 182, 187);"></span>
                            <span data-color="#B9C2DF" style="background-color: rgb(185, 194, 223);"></span>
                            <span data-color="#5FB7D4" style="background-color: rgb(95, 183, 212);"></span>
                            <span data-color="#2F366C" style="background-color: rgb(47, 54, 108);"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

@endsection 

@push('js') 

@endpush
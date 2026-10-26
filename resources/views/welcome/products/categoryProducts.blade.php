@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle($category->seo_title?:$category->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle($category->seo_title?:$category->name)}}" />
<meta name="description" property="og:description" content="{!!$category->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$category->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{assetUrl(general()->favicon())}}" />
<meta name="url" property="og:url" content="{{route('productCategory',$category->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('productCategory',$category->slug?:'no-title')}}">
@endsection @push('css')
<style>
.categoryUiMain{
    background: #f8f9fa;
    padding: 40px 0;
}

.ctgCat{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    background: #fff;
    border: 1px solid #ececec;
    border-radius: 12px;
    padding: 20px 15px;
    transition: all .3s ease;
    max-height: 175px;
    height: 100%;
    box-shadow: 0 2px 10px rgba(0,0,0,.05);
}

.ctgCat:hover{
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,.12);
    border-color: #0d6efd;
}

.ctgCat img{
    width: 100%;
    max-width: 270px;
    max-height: 100px;
}

.ctgCat p{
    margin: 0;
    color: #333;
    font-size: 15px;
    font-weight: 600;
    text-align: center;
}

.ctgCat:hover p{
    color: #0d6efd;
}
.ctgCat span {
    color: #000;
    display: block;
    font-size: 14px;
}

.product-grids.categoryProductGrid {
    padding-top: 30px;
}

.addTo {
    color: #fff;
    border: none;
    background: #25d366;
    border-radius: 34px;
}


</style>
<script>
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({
        event: "page_view",
        page_category: "category",
        page_title: "{{$category->name}}",
        page_url: "{{route('productCategory',$category->slug?:'no-title')}}"
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


<div class="pageBreadcam">
    <div class="container">
        <ul>
            <li>
                <a href="{{route('index')}}">Home</a>
            </li>
            <li>
                <a href="">/</a>
            </li>
            <li>
                <a href="#">{{$category->name}}</a>
            </li>
        </ul>
    </div>
</div>


<!--@if($subCategories->count() > 0)-->
<!--<div class="categoryUiMain py-4">-->
<!--    <div class="container">-->
<!--        <div class="row g-4">-->
<!--            @foreach($subCategories as $ctg)-->
<!--            <div class="col-6 col-md-3 col-lg-2">-->
<!--                <a href="{{ route('productCategory', $ctg->slug ?: Str::slug($ctg->name)) }}" class="ctgCat">-->
<!--                    <img src="{{ assetUrl($ctg->image()) }}" alt="{{ $ctg->name }}">-->
<!--                    <p>{{ $ctg->name }}</p>-->
<!--                    <span>5 PRODUCTS</span>-->
<!--                </a>-->
<!--            </div>-->
<!--            @endforeach-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--@endif-->


@if($category->subctgs()->where('status','active')->count() > 0)

<div class="categoryUiMain py-4">
    <div class="container">
        <div class="row g-4">
            @foreach($category->subctgs()->where('status','active')->get() as $ctg)
            <div class="col-6 col-md-3 col-lg-2">
                <a href="{{ route('productCategory', $ctg->slug ?: Str::slug($ctg->name)) }}" class="ctgCat">
                    <img src="{{ assetUrl($ctg->image()) }}" alt="{{ $ctg->name }}">

                    <p>{{ $ctg->name }}</p>

                    <span>
                        {{
                            \App\Models\Post::where('status','active')
                                ->whereHas('ctgProducts', function($q) use ($ctg){
                                    $q->where('reff_id', $ctg->id);
                                })
                                ->count()
                        }}
                        Products
                    </span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@else

<div class="product-grids categoryProductGrid">
    
    <div class="container">
        
        <div class="row">
            @foreach($products as $product)
                <div class="col-6 col-md-2">
                 @include(welcomeTheme().'products.includes.productCard')
                 </div>
            @endforeach
        </div>

        {{--<div class="mt-4">
            {{ $products->links() }}
        </div>--}}
        
    </div>
    
    
</div>

@endif






<!-- Start of Page Content -->
{{-- <div class="page-content mb-10">
     <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6" style="background-image: url({{assetUrl($category->banner())}}); background-color: #FFC74E;">
         <div class="banner-content">
             <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10">{{$category->name}} </h3>
         </div>
     </div>

     <div class="container">

         <div class="shop-content">

             <div class="main-content">
                 <div class="row">
                     @foreach($products as $product)
                     <div class="col-md-3 col-6" style="padding: 10px;">
                        @include(welcomeTheme().'products.includes.productCard')
                     </div>
                     @endforeach
                 </div>
                 {{$products->links('pagination')}}
             </div>
   
         </div>
    
     </div>
 </div>--}}


@endsection 
@push('js') @endpush
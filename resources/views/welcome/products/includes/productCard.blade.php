{{--<div class="productGrid">
    @if ($product->discountPercent() > 0 )
    <div class="dBdg"><span>{{$product->discountPercent()}}% off</span></div>
    @endif
    <div class="productImgDiv">
        <a href="{{route('productView',$product->slug?:Str::slug($product->name))}}" style="display:block;"><img src="{{assetUrl($product->image())}}" alt="AJL Sea Food" /></a>
    </div>
    <a href="javascript:void(0)" data-id="{{$product->id}}" data-url="{{route('wishlistCompareUpdate',[$product->id,'wishlist'])}}" title="Add to wishlist" class="wishList {{$product->isWl()?'active':''}} btn-wishlist">
        <span class="load-more-overlay" style="top: 7px;"></span>
        <i class="fa fa-heart-o" aria-hidden="true"></i>
        </a>
    <div class="productContent">
        <a href="{{route('productView',$product->slug?:Str::slug($product->name))}}" class="proTitle">{{Str::limit($product->name,25)}}</a>
        <p class="price"><span> {{priceFullFormat($product->offerPrice())}} @if($product->regular_price > $product->offerPrice())<del>{{priceFullFormat($product->regular_price)}}</del>@endif</span></p>
        <a href="javascript:void(0)" data-id="{{$product->id}}" data-url="{{route('addToCart',$product->id)}}" title="Add to cart" onclick="addToCart({{ json_encode($product) }})" class="addcart btn-cart "><span class="load-more-overlay"></span>Add To Cart</a>
    </div>
</div>--}}

      <div class="product-card">
            <a href="{{route('productView',$product->slug?:Str::slug($product->name))}}" class="product-thumb">
                <img src="{{assetUrl($product->mdImage())}}" data-src="{{assetUrl($product->mdImage())}}" alt="{{$product->name}}" class="main-img" loading="lazy" decoding="async">
                <img src="{{assetUrl($product->hoverImage())}}" data-src="{{assetUrl($product->hoverImage())}}" alt="Hover Image" class="hover-img" loading="lazy" decoding="async">
            </a>
          <div class="product-body">
            <div class="product-cat">
                
            @if($product->productCategories->whereNull('parent_id')->count() > 0)
                    <span class="">
                        @foreach($product->productCategories->whereNull('parent_id') as $i => $ctg)
                            {!! $i > 0 ? ', ' : '' !!}
                            <a href="{{ route('productCategory', $ctg->slug ?: 'no-title') }}">
                                {{ $ctg->name }}
                            </a>
                        @endforeach
                    </span>
                @endif
                
            </div>
            <div class="product-name">{{Str::limit($product->name,25)}}</div>
            <div class="product-price">{{priceFullFormat($product->offerPrice())}} @if($product->regular_price > $product->offerPrice())<del>{{priceFullFormat($product->regular_price)}}</del>@endif</div>
                </a>
                    <div class="productContent">
                     
                        <a href="javascript:void(0)" data-id="{{$product->id}}" data-url="{{route('addToCart',$product->id)}}" title="Add to cart" onclick="addToCart({{ json_encode($product) }})" class="addcart btn-cart "><span class="load-more-overlay"></span>Add To Cart</a>
                    </div>
          </div>
        </div>
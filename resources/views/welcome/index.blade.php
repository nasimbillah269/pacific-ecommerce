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

<style>
    /* Outer Wrapper Container */
    .slider-section {
      width: 100%;
      padding: 40px 60px;
      position: relative;
      overflow: hidden;
      
    }
    
    .homeProductSection {
        margin: 0 20px;
    }

    .slider-container {
      display: flex;
      align-items: center;
      justify-content: space-around;
      gap: 60px;
      position: relative;
    }

    /* Left Image Slider Area */
    .image-slider-wrapper {
      width: 420px;
      height: 270px;
      flex-shrink: 0;
    }

    .image-swiper {
      width: 100%;
      height: 100%;
      border-radius: 16px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08), 
                  0 8px 16px rgba(0, 0, 0, 0.04);
      background-color: #ffffff;
      overflow: hidden;
    }

    .image-swiper .swiper-slide {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #ffffff;
      padding: 20px;
    }

    .image-swiper img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
      user-select: none;
      /* Image Animation Styling */
      transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.6s ease;
      transform: translateX(-40px);
      opacity: 0;
    }

    /* Active State Image Animation */
    .image-swiper .swiper-slide-active img {
      transform: translateX(0);
      opacity: 1;
    }

    /* Right Text Content Slider Area */
    .text-slider-wrapper {
      flex: 1;
      max-width: 650px;
    }

    .text-swiper {
      width: 100%;
      height: 100%;
    }

    .text-swiper .swiper-slide {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
    }

    .text-content-box {
      /* Text Animation Styling */
      transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.6s ease;
      transform: translateX(40px);
      opacity: 0;
    }

    /* Active State Text Animation */
    .text-swiper .swiper-slide-active .text-content-box {
      transform: translateX(0);
      opacity: 1;
    }

    /* Content Typography & Buttons */
    .product-title {
      font-size: 36px;
      font-weight: 700;
      color: #0b0b0b;
      letter-spacing: -0.5px;
      margin-bottom: 16px;
      line-height: 1.2;
    }

    .product-description {
      font-size: 16px;
      line-height: 1.5;
      color: #4a4a4a;
      margin-bottom: 32px;
      font-weight: 400;
    }

    .button-group {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 12px 28px;
      border-radius: 30px;
      font-size: 15px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.25s ease;
      cursor: pointer;
      border: none;
      outline: none;
    }

    .btn-primary {
      background-color: #0060b6;
      color: #ffffff;
    }

    .btn-primary:hover {
      background-color: #004d93;
      box-shadow: 0 4px 12px rgba(0, 96, 182, 0.25);
    }

    .btn-success {
      background-color: #22c55e;
      color: #ffffff;
    }

    .btn-success:hover {
      background-color: #16a34a;
      box-shadow: 0 4px 12px rgba(34, 197, 94, 0.25);
    }

    /* Circular Navigation Arrow Buttons */
    .nav-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background-color: #ffffff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08), 0 2px 4px rgba(0, 0, 0, 0.04);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 10;
      transition: all 0.2s ease;
      border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .nav-btn:hover {
      background-color: #f8f9fa;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
      transform: translateY(-50%) scale(1.05);
    }

    .nav-btn svg {
      width: 18px;
      height: 18px;
      stroke: #1a1a1a;
      stroke-width: 2.5;
      fill: none;
    }

    .nav-btn-prev {
      left: 10px;
    }

    .nav-btn-next {
      right: 10px;
    }
    
    
    .product-grid-item {
    padding: 2px;
    background: #f6f6f6;
}
    .product-card {
    border: 1px solid #f5f5f5;
    border-radius: 0;
    }
    
    
    
    
    

    @media (max-width: 992px) {
      .slider-container {
        flex-direction: column;
        text-align: center;
      }
      
      .text-swiper .swiper-slide {
        align-items: center;
      }

      .image-slider-wrapper {
        width: 320px;
        height: 320px;
      }

      .product-title {
        font-size: 28px;
      }
    }
    
    
    
    
    
    
    
    
    
    .product-item{
    display:none;
}

.skeleton-card{
    border:1px solid #eee;
    border-radius:10px;
    padding:10px;
    background:#fff;
}

.skeleton-img{
    height:220px;
    border-radius:8px;
    margin-bottom:10px;
}

.skeleton-line{
    height:14px;
    margin-bottom:8px;
    border-radius:5px;
}

.skeleton-line.small{
    width:60%;
}

.skeleton-img,
.skeleton-line{
    background:linear-gradient(
        90deg,
        #f2f2f2 25%,
        #e6e6e6 37%,
        #f2f2f2 63%
    );
    background-size:400% 100%;
    animation:skeleton 1.2s infinite;
}

@keyframes skeleton{
    from{
        background-position:100% 0;
    }
    to{
        background-position:0 0;
    }
}
    


.grid-nav-arrow.disabled{
    pointer-events: none;
    opacity: .5;
    cursor: not-allowed;
}





#productWrapper{
    position:relative;
    min-height:500px;
}

#productOverlay{
    position:absolute;
    inset:0;
    display:none;
    align-items:center;
    justify-content:center;
    background:rgba(255,255,255,.6);
    backdrop-filter:blur(6px);
    -webkit-backdrop-filter:blur(6px);
    z-index:9999;
}

#productWrapper.loading #productOverlay{
    display:flex;
}

#productWrapper.loading #productGrid{
    filter:blur(4px);
    pointer-events:none;
}

.loader{
    width:60px;
    height:60px;
    border:6px solid #ddd;
    border-top-color:#0d6efd;
    border-radius:50%;
    animation:spin .8s linear infinite;
}

@keyframes spin{
    to{
        transform:rotate(360deg);
    }
}







    
    
    
</style>



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
    

</style>



@endpush 

@section('contents')

{{--@include(welcomeTheme().'layouts.slider')--}}




<!-- ===== CATEGORY NAV ===== -->
<nav class="category-nav">
  <div class="container-fluid">
    <div class="row justify-content-center g-2">
        
      @foreach($categories as $category)
      <div class="col-6 col-md-3 text-center"><a href="{{route('productCategory',$category->slug?:Str::slug($category->name))}}" class="cat-btn"><img loading="lazy" decoding="async" src="{{assetUrl($category->image())}}"  alt="" /> </a></div>
      @endforeach
      
    </div>
  </div>
</nav>


<!-- ===== ALL PRODUCTS ===== -->
<section class="homeProductSection" id="productWrapper">
  <div class="">
    <div class="section-title-wrap position-relative">
      <h2>All Products</h2>
    </div>
      
     <div id="productOverlay">
        <div class="loader"></div>
    </div>

    <div class="row" id="productGrid" style="min-height: 1000px;">
        <!-- AJAX এর মাধ্যমে প্রোডাক্ট কার্ডগুলো এখানে ডায়নামিক্যালি লোড হবে -->
    </div>

    <!-- Pagination Navigation Arrows -->
    <div class="d-flex justify-content-center gap-2 mt-4">
        <a href="javascript:void(0)" class="grid-nav-arrow" id="productPrevBtn">
            <i class="fa-solid fa-chevron-left"></i>
        </a>
        <a href="javascript:void(0)" class="grid-nav-arrow" id="productNextBtn">
            <i class="fa-solid fa-chevron-right"></i>
        </a>
    </div>
  </div>
</section>




  <section class="slider-section">
    <!-- Navigation Buttons -->
    <div class="nav-btn nav-btn-prev" id="prevBtn">
      <svg viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></svg>
    </div>
    <div class="nav-btn nav-btn-next" id="nextBtn">
      <svg viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
    </div>

    <div class="slider-container">
      
      <!-- Left Image Carousel -->
      <div class="image-slider-wrapper">
        <div class="swiper image-swiper">
          <div class="swiper-wrapper">
              
      
     
        @foreach($categories as $category)
            <div class="swiper-slide">
              <img src="{{assetUrl($category->banner())}}"  loading="lazy" decoding="async" alt="Industrial Machinery 1">
            </div>
 
            @endforeach
            
          </div>
        </div>
      </div>

      <!-- Right Text Content Carousel -->
      <div class="text-slider-wrapper">
        <div class="swiper text-swiper">
          <div class="swiper-wrapper">
            
            

      
      
      @foreach($categories as $category)
            
            <div class="swiper-slide">
              <div class="text-content-box">
                <h2 class="product-title">{{$category->name}}</h2>
                <p class="product-description">
                  {!! $category->description !!}
                </p>
                <div class="button-group">
                  <a href="{{route('productCategory',$category->slug?:Str::slug($category->name))}}" class="btn btn-primary">View Product</a>
                 <a href="https://wa.me/8801722955573" class="btn btn-success" target="_blank">
                    WhatsApp
                 </a>
                </div>
              </div>
            </div>
            
            @endforeach



          </div>
        </div>
      </div>

    </div>
  </section>



<!-- ===== TRUSTED BY ===== -->
<section class="trusted-section">
  <div class="">
    <div class="section-title-wrap">
      <h2>Trusted by Leading Factories</h2>
    </div>
    
    <div class="trusted-slider">

  @foreach($latestPosts as $post)
    <!-- Item 1 -->
    <div class="slick-box">
        <div class="trustedGrid">
            <div class="trustedCard">

                <div class="trustedFront">
                    <img src="{{assetUrl($post->image())}}" loading="lazy" decoding="async" alt="Mark Group">
                </div>

                <div class="trustedBack">
                    <a href="{{route('blogView',$post->slug?:'no-title')}}">Learn More</a>
                </div>

            </div>
        </div>
    </div>
         @endforeach



</div>
    
  </div>
</section>





@endsection

@push('js')
<script>
    // Text Swiper Setup
    const textSwiper = new Swiper('.text-swiper', {
      effect: 'fade',
      fadeEffect: { crossFade: true },
      speed: 600,
      loop: true,
      allowTouchMove: false
    });

    // Image Swiper Setup with Autoplay & Loop
    const imageSwiper = new Swiper('.image-swiper', {
      effect: 'fade',
      fadeEffect: { crossFade: true },
      speed: 600,
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      },
      grabCursor: true,
      navigation: {
        nextEl: '#nextBtn',
        prevEl: '#prevBtn',
      },
      controller: {
        control: textSwiper
      }
    });
</script>

<script>
    function showLoader(){
        $('#productWrapper').addClass('loading');
    }

    function hideLoader(){
        $('#productWrapper').removeClass('loading');
    }

    let offset = 0;
    let limit = 32; // Server always returns 32 products per request
    let loading = false;

    let autoplayTimer = null;
    let autoplayDelay = 6000; // Auto-advance to the next 32 products every 6 seconds

    // Load the first set on page load
    loadProducts(offset);
    startAutoplay();

    function loadProducts(currentOffset){
        if(loading) return;
        loading = true;

        $.ajax({
            url: "{{ route('loadMoreProducts') }}",
            type: "GET",
            data: { offset: currentOffset, limit: limit },
            beforeSend: function(){
                showLoader();
            },
            success: function(res){
                loading = false;

                // Reached the end (no more products) - loop back to the start
                if(res.html.trim() === ''){
                    hideLoader();
                    offset = 0;
                    loadProducts(offset);
                    return;
                }

                // Place the HTML coming from the server into the grid
                $('#productGrid').html(res.html);
                hideLoader();

                // Init lazy loading for images
                initLazyLoading();

                // Previous Button State
                if(currentOffset <= 0){
                    $('#productPrevBtn').addClass('disabled');
                } else {
                    $('#productPrevBtn').removeClass('disabled');
                }
            },
            error: function(){
                hideLoader();
                loading = false;
            }
        });
    }

    function startAutoplay(){
        stopAutoplay();
        autoplayTimer = setInterval(function(){
            offset += limit;
            loadProducts(offset);
        }, autoplayDelay);
    }

    function stopAutoplay(){
        if(autoplayTimer){
            clearInterval(autoplayTimer);
            autoplayTimer = null;
        }
    }

    // Pause auto-rotation while the visitor's mouse is over this section, resume when they leave
    $('#productWrapper').on('mouseenter', stopAutoplay).on('mouseleave', startAutoplay);

    // Next Button Click Event
    $('#productNextBtn').click(function(e){
        e.preventDefault();
        if($(this).hasClass('disabled')) return;

        offset += limit;
        loadProducts(offset);
        startAutoplay();

        $('html, body').animate({
            scrollTop: $('#productWrapper').offset().top - 100
        }, 300);
    });

    // Previous Button Click Event
    $('#productPrevBtn').click(function(e){
        e.preventDefault();
        if($(this).hasClass('disabled')) return;

        if(offset >= limit){
            offset -= limit;
            loadProducts(offset);
            startAutoplay();

            $('html, body').animate({
                scrollTop: $('#productWrapper').offset().top - 100
            }, 300);
        }
    });
</script>
@endpush
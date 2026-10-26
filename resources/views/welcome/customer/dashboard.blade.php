@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Dashboard')}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('Dashboard')}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keywords" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{assetUrl(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('customer.dashboard')}}" />
<link rel="canonical" href="{{route('customer.dashboard')}}">
@endsection 
@push('css')
<style>
 main.main {
    min-height: 0 !important;
}
p.greeting {
    margin: 20px 0 0;
}
.text-dark {
    color: #444 !important;
}
.text-primary {
    color: #e6903f !important;
}
#account-dashboard .icon-box {
    padding: 4rem 2rem;
    border: 1px solid #e6903f;
    border-radius: 3px;
    transition: all 0.4s;
}
.my-account .nav-link, .my-account .link-item {
    margin-bottom: 0 !important;
    padding: 1.7rem 0 1.6rem !important;
    font-size: 1.6rem !important;
    text-transform: none !important;
    border-bottom: 1px solid #e6903f !important;
}

.icon-box-icon i {
    font-size: 70px;
    font-weight: 400;
    line-height: 1;
}
.icon-box p {
    font-size: 1.3rem;
    word-break: break-word;
    margin: 0;
    line-height: 1.2;
    color: #444 !important;
}
.nav-link {
    color: #444 !important;
}
.link-item a.active {
    color: #e89340 !important;
}
.link-item a {
    display: block;
    background-color: aqua;
    font-weight: bold;
    margin: 10px 10px 17px 0px;
    border-radius: 5px;
    color: #444;
    padding: 10px;
}
.tab-vertical .tab-content {
    border-top: none !important;
}
</style>
@endpush 

@section('contents')

<!-- Start of Page Header -->
<div class="page-header">
    <div class="overlayPageHeaderNew">
        <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
        </div>
    </div>
</div>
<!-- End of Page Header -->

<div class="page-content pt-2">
    <div class="container">
        <div class="tab tab-vertical row gutter-lg">
            @include(welcomeTheme().'.customer.includes.sidebar')

            <div class="tab-content mb-6">
                <div class="tab-pane active in" id="account-dashboard">
                    <p class="greeting">
                        Hello
                        <span class="text-dark font-weight-bold">{{$user->name}}</span>
                        (not
                        <span class="text-dark font-weight-bold">{{$user->name}}</span>? <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-primary">Log out</a>)
                    </p>
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                            <a href="{{route('customer.myOrders')}}" class="link-to-tab">
                                <div class="icon-box text-center">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <p class="text-uppercase mb-0">Orders</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                            <a href="{{route('customer.profile')}}" class="link-to-tab">
                                <div class="icon-box text-center">
                                    <span class="icon-box-icon icon-account">
                                        <i class="w-icon-user"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <p class="text-uppercase mb-0">Account Details</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                            <a href="{{route('myWishlist')}}" class="link-to-tab">
                                <div class="icon-box text-center">
                                    <span class="icon-box-icon icon-wishlist">
                                        <i class="w-icon-heart"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <p class="text-uppercase mb-0">Wishlist</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection @push('js') @endpush
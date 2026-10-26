@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle('My Orders')}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('My Orders')}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keywords" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{assetUrl(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('customer.myOrders')}}" />
<link rel="canonical" href="{{route('customer.myOrders')}}">
@endsection 
@push('css')
<style>
main.main {
    min-height: 0 !important;
}
.text-dark {
    color: #fff !important;
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
    color: #fff !important;
}
.nav-link {
    color: #fff !important;
}
.link-item a.active {
    color: #e89340 !important;
}

.tab-vertical .tab-content {
    border-top: none !important;
}
table.shop-table.account-orders-table.mb-6 {
    width: 100%;
    padding: 20px;
    background-color: #f7f7f7;
    margin-top: 20px;
}
table.shop-table.account-orders-table.mb-6 tr, td {
    font-size: 14px;
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 5px 10px;
}
ul.pager {
    text-align: center;
    background-color: #e9e9e9;
    padding: 10px 0;
    margin: 20px 0;
}
table.shop-table.account-orders-table.mb-6 th {
    padding: 5px 10px;
    border: 1px solid #ccc;
    font-size: 17px;
    color: #444;
}
a.btn.btn-outline.btn-default.btn-block.btn-sm.btn-rounded {
    background-color: aquamarine;
}
</style>
@endpush 
@section('contents')

<!-- Start of Page Header -->
<div class="page-header">
    <div class="overlayPageHeaderNew">
        <div class="container">
            <h1 class="page-title mb-0">My Orders</h1>
        </div>
    </div>
</div>
<!-- End of Page Header -->


<div class="page-content pt-2">
    <div class="container">
        <div class="tab tab-vertical row gutter-lg">
            @include(welcomeTheme().'.customer.includes.sidebar')
            <div class="tab-content mb-6">
                <div class="tab-pane active mb-4" id="account-orders">
                    <div class="table-responsive">
                        
                    
                    <table class="shop-table account-orders-table mb-6">
                        <thead>
                            <tr>
                                <th class="order-id text-left">Order</th>
                                <th class="order-date text-left">Date</th>
                                <th class="order-status text-left">Status</th>
                                <th class="order-total text-left">Total</th>
                                <th class="order-actions text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $i=>$order)
                            <tr>
                                <td class="order-id text-left">#{{$order->invoice}}</td>
                                <td class="order-date text-left">{{$order->created_at->format('M d, Y')}}</td>
                                <td class="order-status text-left">{{$order->order_status}}</td>
                                <td class="order-total text-left"><span class="order-price">{{ priceFullFormat($order->grand_total)}}</span> for <span class="order-quantity"> {{$order->items->count()}}</span> item</td>
                                <td class="order-action">
                                    <a href="{{ route('customer.orderDetails',$order->invoice) }}" class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                </td>
                            </tr>
                            @endforeach
                            @if($orders->count()==0)
                            <tr>
                                <td colspan="5" class="order-date text-left">No Order</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <br>
                    {{ $orders->links('pagination') }}
                    <br>
                    </div>
                    <a href="{{route('index')}}" class="btn btn-dark btn-rounded btn-icon-right"><span style="background-color: #000; color: #fff;">Go</span> Shop<i class="w-icon-long-arrow-right"></i></a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
@endpush
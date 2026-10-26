@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{$page->seo_title?:websiteTitle($page->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{$page->seo_title?:websiteTitle($page->name)}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{assetUrl($page->image())}}" />
<meta name="url" property="og:url" content="{{route('pageView',$page->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('pageView',$page->slug?:'no-title')}}">
@endsection
@push('css')
<style>

</style>
<script>
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({
        event: "page_view",
        page_category: "page",
        page_title: "{{$page->name}}",
        page_url: "{{route('pageView',$page->slug?:'no-title')}}"
    });
</script>
@endpush 

@section('contents')

<!-- Start of Page Header -->
<div class="page-header" style="background-image: url({{assetUrl($page->image())}}); background-position: center; background-size: cover; background-repeat: no-repeat;">
    <div class="overlayPageHeaderNew">
        <div class="container">
            <h1 class="page-title mb-0">{{$page->name}} </h1>
        </div>
    </div>
</div>
<!-- End of Page Header -->

<!-- contact us section start -->
<div class="mapDiv">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.711768033301!2d90.3644656!3d23.757655699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf004f8efb6b%3A0x4ea30bdd6fc942e2!2sI-7%2C%20Block-E%2C%20Kazi%20Nazrul%20Islam%20Road%2C%20Mohammadpur%2C%20Dhaka-1207!5e0!3m2!1sen!2sbd!4v1726137908930!5m2!1sen!2sbd" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div class="contactUsPart">
    <div class="container">
        <div class="newRow">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="contactInfo">
                        <h4>Store in Bangladesh</h4>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="contactInfo">
                        <p>
                            {{general()->address_one}}
                        </p>
                        <p class="phone">{{general()->mobile}}</p>
                        <p class="email">{{general()->email}}</p>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

        <div class="contaictUsForm">
            <h4>Get in touch !</h4>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <strong>Success! </strong> {{Session::get('success')}}.
            </div>
            @endif
            <form action="{{route('contactMail')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-5">
                        <div class="mb-3">
                            @if ($errors->has('name'))
                            <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('name') }}</p>
                            @endif
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Your Name" />
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            @if ($errors->has('email'))
                            <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('email') }}</p>
                            @endif
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Your Email" />
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="mb-3">
                            @if ($errors->has('message'))
                            <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('message') }}</p>
                            @endif
                            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" placeholder="Your Message" rows="6"></textarea>
                        </div>
                        <button type="submit" class="btnSendMsg">Send Message</button>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- contact us section end-->

@endsection @push('js')

<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("contentForm").submit();
    }
</script>

@endpush
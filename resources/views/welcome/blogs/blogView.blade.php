@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle($post->seo_title?:$post->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle($post->seo_title?:$post->name)}}" />
<meta name="description" property="og:description" content="{!!$post->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$post->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{assetUrl($post->image())}}" />
<meta name="url" property="og:url" content="{{route('blogView',$post->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('blogView',$post->slug?:'no-title')}}">
@endsection @push('css')
<style>
.blogImg {
    display: block;
    max-width: 220px;
    margin: 0 auto;
    width: 220px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}
.post-details {
    padding: 20px;
    background-color: unset;
    margin-top: 20px;
}

.pViewHead {
    text-align: center;
    margin-bottom: 40px;
}

.pdescription p {
    margin-bottom: 20px;
}

.pdescription ul li {
    margin-bottom: 12px;
    list-style: disc;
    margin-left: 20px;
}

.pdescription h1, h2, h3, h4, h5, h6 {
    margin-bottom: 10px;
}


</style>
@endpush 

@section('contents')

<!-- Start of Page Header -->
{{--<div class="page-header">
    <div class="overlayPageHeaderNew">
        <div class="container">
            <h1 class="page-title mb-0">{{$post->name}}</h1>
        </div>
    </div>
</div>--}}
<!-- End of Page Header -->

<div class="blogPage-content">
    <div class="container">
       <div class="blogViewImg">
            <img class="blogImg" src="{{assetUrl($post->image())}}" alt="Blog" />
       </div>
        <div class="post-details">
            
            <div class="pViewHead">
                <h2 class="post-title">{{$post->name}}</h2>
                
                <p>{{ $post->short_description }}</p>
            </div>
            
            
            <div class="pdescription">{!!$post->description!!}</div>
        </div>
        <!-- End Post -->
    </div>
</div>
<!-- End of Page Content -->

@endsection @push('js') @endpush
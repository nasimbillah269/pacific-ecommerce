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


<!-- Start of Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row my-5">
            @foreach($posts as $post)
            <div class="col-md-4">
                @include(welcomeTheme().'blogs.includes.blogGrid')
            </div>
            @endforeach
        </div>
		{{$posts->links(welcomeTheme().'blogs.pagination')}}
    </div>
</div>
<!-- End of Page Content -->


@endsection @push('js') @endpush
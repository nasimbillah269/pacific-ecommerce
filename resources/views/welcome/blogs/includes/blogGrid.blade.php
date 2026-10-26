<div class="latestBlogGrid">
    <div class="blogImg">
        <img src="{{assetUrl($post->image())}}" alt="AJL Sea Food" />
    </div>
    <div class="blogContent">
        <ul>
            <li><i class="fa fa-calendar" aria-hidden="true"></i> {{$post->created_at->format('M')}} {{$post->created_at->format('d')}}, {{$post->created_at->format('Y')}}</li>
            {{--<li><i class="fa fa-comments" aria-hidden="true"></i> Comments</li>--}}
        </ul>
        <h5>{{Str::limit($post->name,25)}}</h5>
        <p>
            {{Str::limit($post->short_description,150)}}
        </p>
        <a href="{{route('blogView',$post->slug?:'no-title')}}">
            Read More
            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        </a>
    </div>
</div>
<div class="destopSlider">
  
  <div  class="singlefeturedImage">
    <div class="full">
    <img class="block__pic" src="{{ assetUrl($product->fi()) }}" alt="{{$product->title}}">
    </div>
  </div>

  <div class="singleproductgallery">
    <a  class="selected" data-full="{{ assetUrl($product->fi()) }}"><img src="{{ assetUrl($product->fi()) }}" alt="{{$product->title}}" /></a>
    <!-- @foreach($product->images as  $img)
    <a  data-full="{{ assetUrl($img->img_name) }}"><img src="{{ assetUrl($img->img_name) }}" alt="{{$product->title}}" /></a>
    @endforeach -->
   
  </div>
</div>


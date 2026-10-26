@foreach($products as $product)
<div class="product-grid-item">
    @include(welcomeTheme().'.products.includes.productCard')
</div>
@endforeach
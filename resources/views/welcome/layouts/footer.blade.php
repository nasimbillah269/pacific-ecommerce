<!-- ===== FOOTER ===== -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-logo mb-2">
        <!--SKY <small style="font-size:.6rem;display:block;font-weight:400;">KNITING THE FUTURE</small>-->
        <img src="{{assetUrl('welcome/images/Sky.png')}}" alt="footer logo" />
    </div>
    <div class="text-center footer-social mb-4">

    @if(!App\Models\General::first()->facebook_link == null)
        <a href="{{ App\Models\General::first()->facebook_link }}"
           target="_blank"
           style="background-color:#1877F2; color:#fff;">
            <i class="fa-brands fa-facebook-f"></i>
        </a>
    @endif


    @if(!App\Models\General::first()->youtube_link == null)
        <a href="{{ App\Models\General::first()->youtube_link }}"
           target="_blank"
           style="background-color:#FF0000; color:#fff;">
            <i class="fa-brands fa-youtube"></i>
        </a>
    @endif


    @if(!App\Models\General::first()->linkedin_link == null)
        <a href="{{ App\Models\General::first()->linkedin_link }}"
           target="_blank"
           style="background-color:#0A66C2; color:#fff;">
            <i class="fa-brands fa-linkedin-in"></i>
        </a>
    @endif


    <!-- WhatsApp -->
    <a href="#"
       style="background-color:#25D366; color:#fff;"
       aria-label="WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>


    <!-- Shopping Bag -->
    <!--<a href="#"-->
    <!--   style="background-color:#333333; color:#fff;"-->
    <!--   aria-label="Shopping Bag">-->
    <!--    <i class="fa-solid fa-bag-shopping"></i>-->
    <!--</a>-->

</div>

    <div class="row justify-content-center text-center text-md-start g-4 footer-contact">
      <div class="col-md-3">
        <h6>Address</h6>
        <p class="mb-0 footer-line"><span class="footer-item">Boardbazar, National University-1704,</span> <span class="footer-item">Gazipur City</span></p>
        <a href="https://maps.app.goo.gl/uSLz2ibZMv5RQRHC8" target="_blank" class="d-inline-block mt-2 small findmap">Find us on map</a>
      </div>
      <div class="col-md-3">
        <h6>Phone</h6>
        <p class="mb-1 footer-line footer-sep"><a class="footer-item" href="tel:+8801722955573">+880 1722-955573</a> <a class="footer-item" href="tel:+8801824242129">+880 1824-242129</a></p>
      </div>
      <div class="col-md-3">
        <h6>Email</h6>
        <p class="mb-0 footer-line footer-sep"><a class="footer-item" href="mailto:info@pacificnit.com">info@pacificnit.com</a> <a class="footer-item" href="mailto:pacificnit24@gmail.com">pacificnit24@gmail.com</a></p>
      </div>
    </div>

    <div class="footer-bottom">
      © 2018-2026 Pacific Nit All Rights Reserved. | Design &amp; Developed by <a href="#">Natore-IT</a>
    </div>
  </div>
</footer>

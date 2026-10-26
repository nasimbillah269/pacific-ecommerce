<!-- footer part start -->
<footer>
    <div class="footerMainPart">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footerGrid">
                        <h5>About Us</h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetueradipiscing elit, sed diam
                        </p>
                        <div class="collUs footerCollUs">
                            <div>
                                <i class="fa fa-headphones" aria-hidden="true"></i>
                            </div>
                            <div>
                                <span>Call Us:</span>
                                <p>{{general()->mobile}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footerGrid">
                        <h5>Store Location</h5>
                        <p><b>Office:</b> {{general()->address_one}}</p>
                        <p><b>Mail:</b> {{general()->email}}</p>
                        <p><b>Phone:</b> {{general()->mobile}}</p>
                        <p><b>Mon-Sat:</b> 9am – 10pm</p>
                    </div>
                </div>
                
                <div class="col-md-3">
                    @if($menu =menu('Footer Two'))
                    <div class="footerGrid">
                        <h5>{{$menu->name}}</h5>
                        <ul>
                            @foreach($menu->subMenus as $menu)
                            <li>
                                <a href="{{assetUrl($menu->menuLink())}}">{{$menu->menuName()}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                
                <div class="col-md-3">
                    <div class="footerGrid">
                        <h5>Newsletter</h5>
                        <div class="newsLetterDiv">
                            <div id="subscribeemailMsg"></div>
                            <form id="subscirbeForm" data-url="{{route('subscribe')}}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Enter Your Email" name="email" id="subscribeEmail" />
                                    <button class="btn" type="button" id="button-addon2">
                                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="subscribeemailMsg" id="subscribeemailMsg"></div>
                            </form>
                        </div>
                        <div class="footerSocialLink">
                            <ul>
                                <li>
                                    @if(!App\Models\General::first()->facebook_link==null)
                                    <a href="{{App\Models\General::first()->facebook_link}}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                    @endif
                                </li>
                                <li>
                                    @if(!App\Models\General::first()->twitter_link==null)
                                    <a href="{{App\Models\General::first()->twitter_link}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    @endif
                                </li>
                                <li>
                                    @if(!App\Models\General::first()->instagram_link==null)
                                    <a href="{{App\Models\General::first()->instagram_link}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    @endif
                                </li>
                                <li>
                                    @if(!App\Models\General::first()->linkedin_link==null)
                                    <a href="{{App\Models\General::first()->linkedin_link}}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footerBottomPart">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="copyText">
                        <p>
                            Copyright © 2025 AJL Sea Food – All Rights Reserved.
                            <span>Design & Development By <a href="https://natoreit.com" target="_blank">Natore-IT</a></span>
                        </p>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <div class="footerBottomImg">
                        <img src="{{assetUrl('welcome/images/payment.png')}}" alt="AJL Sea Food" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer part end -->
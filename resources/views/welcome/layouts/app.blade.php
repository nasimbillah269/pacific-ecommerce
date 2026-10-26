<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{csrf_token()}}" />
        <meta name="google-site-verification" content="J83tCwnluEL14Isb7yJlJT1VxKft8ZZmOO0ULHidFFA" />
        <meta name="facebook-domain-verification" content="2n23ndpkt8jdx0lrekp35jp7vsozcp" />
        @yield('title')
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{assetUrl(general()->favicon())}}" />
        @yield('SEO')
        
        <!-- Google Font CDN-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&display=swap" rel="stylesheet" />
        <!-- Bootstrap CS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <!-- Slick Slider CSS CDN-->
        <link rel="stylesheet" type="text/css" href="{{assetUrl(assetLink().'/css/slick.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{assetUrl(assetLink().'/css/slick-theme.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{assetUrl(assetLink().'/css/jquery.fancybox.css')}}" />
        
        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="{{assetUrl(assetLink().'/wow/style.css')}}" />
        <script type="text/javascript" src="{{assetUrl(assetLink().'/wow/jquery.js')}}"></script>
        <!-- End WOWSlider.com HEAD section -->
        
        <!-- Matis Menus CSS -->
        <link rel="stylesheet" href="{{assetUrl(assetLink().'/css/metisMenu.css')}}" />
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
        <!-- Custom Css for this Design -->
        <link rel="stylesheet" href="{{assetUrl(assetLink().'/css/style-v1.1.css')}}" />
        <link rel="stylesheet" href="{{assetUrl(assetLink().'/css/pici.css')}}" />
        
        
          
        <!-- Swiper JS CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        
        
        

        <style>
        
        .category-nav {
                padding-bottom: 0;
            }
            
            .section-title-wrap {
                 margin-bottom: 1rem;
            }
            
            .section-title-wrap h2 {
                font-size: 1rem;
                padding-bottom: .2rem;
            }
            
            .searchDiv {
                width: 60%;
                margin: 0 auto;
                position: relative;
            }

            .searchDiv1 {
                position: relative;
            }

            /* Live Search Suggestions */
            .SearchResult {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                margin-top: 4px;
                background: #fff;
                border-radius: 6px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, .15);
                max-height: 520px;
                overflow-y: auto;
                z-index: 9999;
                text-align: left;
            }

            /* .searchDiv .btn (the Search button) overflows its box via
               right:-37px, so match that here too — otherwise the dropdown
               falls short of the button's true right edge. */
            .searchDiv .SearchResult {
                right: -37px;
            }

            @media (max-width: 992px) {
                .SearchResult {
                    max-height: 360px;
                }
            }

            .SearchResult ul {
                list-style: none;
                margin: 0;
                padding: 0;
            }

            .SearchResult li {
                border-bottom: 1px solid #eee;
            }

            .SearchResult li:last-child {
                border-bottom: 0;
            }

            .SearchResult li a {
                display: block;
                padding: 8px 12px;
                color: #292828;
                text-decoration: none;
            }

            .SearchResult li a:hover {
                background: #f5f7fa;
            }

            .SearchResult li a .row {
                align-items: center;
            }

            .SearchResult li a img {
                width: 40px;
                height: 40px;
                object-fit: cover;
                border-radius: 4px;
            }

            .SearchResult li a p {
                margin: 0;
                font-size: 13px;
                color: #292828;
            }

            .SearchResult li a span {
                font-size: 13px;
                font-weight: 600;
                color: #005baa;
            }

            .SearchResult .searchResultEmpty {
                margin: 0;
                padding: 12px;
                text-align: center;
                color: #8d8f91;
                font-size: 13px;
            }
            .cat-btn img {
                max-width: 150px;
            }
            
            .product-cat {
                min-height: 0;
            }
        
            .load-more-overlay {
                width: 20px;
                height: 20px;
                border: 2px solid #2d5;
                border-bottom-color: transparent;
                border-radius: 50%;
                box-sizing: border-box;
                animation: rotation 1s linear infinite;
                display: none;
                position: absolute;
                left: 8px;
            }
            
            .load-more-overlay.loading {
                display:block;   
            }
            
            .text-content-box p {
                margin-bottom: 20px;
            }
        
            @keyframes rotation {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            } 
            
            .btn-cart {
                position: relative;
            }
            /*.ms a i {*/
            /*    background-color: #fff !important;*/
            /*    color: #000 !important;*/
            /*    font-size: 28px;*/
            /*}*/
            
            
            
            .gallery img {
                border: 1px solid lightgray;
                border-radius: 0;
            }
                        
            .gallery__thumbs img {
                max-width: 150px;
            }
            
            .quntity {
                margin: 5px 0;
                border: 1px solid #d5d0d0;
                display: inline-flex;
                border-radius: 20px;
                    overflow: hidden;
            }
            
            .quntity input {
                    width: 40px;
                
                }
            .quntity button {
            border: 0;
            padding: 5px 6px;
            background-color: #fff;
            width: 30px;
            font-size: 20px;
        }
        
        .dcrementBtn {
             border-right: 1px solid #e3e0e0 !important;
        }
        .incrementBtn {
            border-left: 1px solid #e3e0e0 !important;
        }
        
                    .singleForm {
                margin-top: 20px;
            }
            .addTo {
    background-color: #25d366;
    color: #fff;
    border-radius: 34px;
    border: none;
}


.whatsappLin {
    text-align: center;
}

.whatsappLin a {
    background: #25d366;
    width: 100%;
    display: block;
    padding: 15px 10px;
    border-radius: 10px;
    margin-top: 20px;
    color: #fff;
}   
       .productViewCount p {
    padding: 10px;
    background: #f1f1f1;
    border-radius: 10px;
    color: #4f4f4f;
    margin: 0;
}               

.singlePrductInfoGrid p {;
    margin-top: 20px;
}
.singlePrductInfoGrid h2 {
    font-size: 30px;
    color: #000;
}

.SingleProcutprice span {
    color: #000;
}








.cartDropdown{
    position:relative;
    display:inline-block;
}

/* Header */

.headCart{
    display: flex;
    align-items: center;
    padding: 0px 10px;
    transition: .3s;
    cursor: pointer;
}

.headCart:hover{
    border-color:#0d6efd;
}

.cartIcon{
   width: 30px;
    height: 30px;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    font-size: 15px;
}

.cartCount{
    position: absolute;
    top: 0px;
    right: 0px;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background: #28c336;
    color: #fff;
    font-size: 11px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.headCartInfo{
    display:flex;
    flex-direction:column;
}

.cartTitle{
    color:#222;
    font-weight:700;
    text-transform:uppercase;
    font-size:14px;
}

.cartSubTitle{
    color:#666;
    font-size:13px;
}

/* Dropdown */

.cardBodybox{
    position: absolute;
    right: 0;
    top: 115%;
    min-width: 260px;
    background: #fff;
    box-shadow: 0 15px 40px rgba(0, 0, 0, .15);
    opacity: 0;
    visibility: hidden;
    transform: translateY(15px);
    transition: .35s;
    z-index: 9999;
    padding: 15px;
}

/* Hover */

.emptyCart a {
    background: #2c378d;
    padding: 10px 30px;
    color: #fff;
    display: inline-block;
    margin-top: 10px;
}

.emptyCart svg {
    color: #9e9e9e;
    margin-bottom: 30px;
}





.cartDropdown:hover .cardBodybox{

    opacity:1;

    visibility:visible;

    transform:translateY(0);

}

/* Scroll */

.productBoxlist{

    max-height:320px;

    overflow-y:auto;

}

.cartBoxpart{

    padding:0;

    margin:0;

    list-style:none;

}

.cartBoxpart li{

    border-bottom:1px solid #eee;

    padding:12px 0;

}

.cartItem{

    display:flex;

    align-items:center;

}

.cartImage{

    width:70px;

}

.cartImage img{

    width:60px;

    height:60px;

    object-fit:cover;

    border-radius:6px;

}

.cartContent{

    flex:1;

    padding:0 10px;

}

.cartContent a{
    display: block;
    color: #292828;
    font-size: 13px;
    font-weight: 300;
    text-decoration: none;
    margin-bottom: 5px;

}

.cartContent a:hover{
    color:#000;
}

.cartContent span{
    color: #8d8f91;
    font-weight: 400;
}

.cartRemove{
    width: 25px;
    text-align: right;
    border: 1px solid #bebcbc;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 25px;
    border-radius: 50%;

}

.cartRemove i{

    color:#999;

    cursor:pointer;

    transition:.3s;

}

.cartRemove i:hover{

    color:red;

}

/* Footer */
.subtotalBox{
    color: #8b8888;
    font-size: 16px;
    font-weight: 300;
    border-bottom: 2px solid #ececec;
    padding: 10px 0;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}



.viewcartBox,

.checkoutBox{
    flex:1;
    text-align:center;
    padding:10px;
    text-decoration:none;
    font-weight:600;

}

.viewcartBox{
    background: #0b3d91;
    color:#fff;
}

.viewcartBox:hover{

    background: #26c214;
    color: #fff;

}

.checkoutBox{
    background: #25d366 !important;
    color: #fff !important;

}

.cartBoxbtn a {
    display: block;
    margin-bottom: 10px;
}


.checkoutBox:hover{

    background:#0a58ca;

    color:#fff;

}

/* Empty */

.emptyCart{
    text-align:center;
    padding:40px 0;
    margin-bottom: 0;
    background: #fff;
}

.emptyCart i{

    font-size:45px;

    color:#ddd;

}

.emptyCart h4{

    margin-top:15px;

    margin-bottom:5px;

}

.emptyCart p{
    color: #817e7e;
    font-size: 14px;
    font-family: unset;
    letter-spacing: 0;
    margin-bottom: 20px;
}



.autoVideoPlayMain{
    width:100%;
    overflow:hidden;
}

.autoVideoPlayMain video{
    width: 80%;
    height: 95%;
    display: block;
    object-fit: cover;
    margin: 0 0 0 auto;
}

.autoVideoPlayMain{
    width:100%;
    overflow:hidden;
}

.autoVideoPlayMain img{
    width: 80%;
    height: 95%;
    display: block;
    object-fit: cover;
    margin: 0 0 0 auto;
}




.product-cat span a {
    color: #000;
    margin-top: 5px;
    display: block;
}

.trusted-slider {
    width: 100%;
    overflow: hidden;
    background: #005baa;
    padding: 40px 0;
}


.trustedGrid img {max-height: 80px;max-width: 140px;object-fit: contain;}

.trustedGrid {
    display: flex;
    width: 180px;
    height: 120px;
    border: 1px solid;
    align-items: center;
    justify-content: center;
    background: #fff;
    border-radius: 20px;
}





.trustedGrid{
    perspective:1000px;
    height:150px;
}

.trustedCard{
    position:relative;
    width:100%;
    height:100%;
    transition:.7s;
    transform-style:preserve-3d;
}

.trustedGrid:hover .trustedCard{
    transform:rotateY(180deg);
}

.trustedFront,
.trustedBack{
    position:absolute;
    width:100%;
    height:100%;
    left:0;
    top:0;
    border-radius:10px;
    overflow:hidden;
    backface-visibility:hidden;
    background:#fff;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.trustedFront{
    display:flex;
    align-items:center;
    justify-content:center;
}

.trustedFront img{
    max-width:80%;
    max-height:80%;
    object-fit:contain;
}

.trustedBack{
    transform:rotateY(180deg);
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    padding:15px;
}

.trustedBack h5{
    font-size:18px;
    margin-bottom:8px;
}

.trustedBack p{
    font-size:14px;
    margin-bottom:15px;
}

.trustedBack a{
    display:inline-block;
    padding:8px 18px;
    background:#000;
    color:#fff;
    border-radius:30px;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
}

.trustedBack a:hover{
    background:#222;
    color:#fff;
}


.headerMidPart {
    display: none;
}

.headerTopPart {
    display: none;
}

.headerNavPart {
    display: none;
}

.headLine {
    display: none;
}

.productContent {
    padding: 0;
}




@media (max-width: 1400px) {
    .brand-logo img {
            max-width: 185px;
        }
        .productContent a.addcart {
            padding: 2px 0;
        }
        .searchDiv {
            max-width: 80%;
            margin: 0 auto;
        }
        
}





@media (max-width: 768px) {
      .site-header {
        display: none;
    }
    .headLine {
        display: none;
    }
    .logoDiv a img {
      max-width: 80%;
    }
    .logoDiv .brand-logo {
      flex: 1;
      min-width: 0;
    }
    .logoDiv .brand-logo img.brand-favicon {
      height: 34px;
    }
    .logoDiv .brand-logo img.brand-main-logo {
      max-width: calc(100% - 42px);
    }

        .headerAccount ul {
        display: flex;
    }
    
    .headerMidPart {
            display: block;
        }

  .text-content-box {
    max-width: 318px;
    }
    .mobileFixedFooter {
        display: none !important;
    }
    .moble-menus-models {
    background: #0c3e91;
    color: #fff;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
}

.moble-menus-models i {
    font-size: 14px;
    text-align: center;
    color: #fff;
}

.cart-count {
           background: #1dc81d;
        width: 14px;
        height: 14px;
        display: block;
        color: #fff !important;
        text-align: center;
        border-radius: 50%;
        font-size: 10px !important;
}

    .headerAccount ul li a .cart-count {
        position: absolute;
        top: 12px;
        right: 48px;
    }

    
    
}


.sideCheck {
    background: #25d366;
    color: #fff;
    padding: 14px;
    border-radius: 10px;
}

.sideCart {
    background: #005baa;
    padding: 14px;
    color: #fff;
    border-radius: 10px;
}
.sideCheck:hover {
    color: #fff;
}
.sideCart:hover {
    color: #fff;
}


.header-wrapper{
    position:relative;
    width:100%;
    z-index:9999;
    transition:all .35s ease;
}

.header-wrapper.sticky{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    background:#fff;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
    animation:slideDown .35s ease;
}

.header-wrapper.sticky .topbar{
    padding:6px 0;
}

.header-wrapper.sticky .site-header{
    padding:10px 0;
}

.site-header{
    transition:.35s;
}

.topbar{
    transition:.35s;
}

@keyframes slideDown{

    from{
        transform:translateY(-100%);
        opacity:0;
    }

    to{
        transform:translateY(0);
        opacity:1;
    }

}

.side-modals {
    z-index: 9999999;
}

/* ===========================
   Website Preloader
=========================== */
#pageLoader{
    position: fixed;
    inset: 0;
    background: #ffffff;
    z-index: 999999;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity .5s ease, visibility .5s ease;
}

#pageLoader.hide{
    opacity: 0;
    visibility: hidden;
}

.loader-content{
    text-align: center;
}

.loader-logo{
    width: 380px;
    max-width: 85%;
    margin-bottom: 25px;
    animation: fadeIn 1s ease;
}

.spinner{
    width: 60px;
    height: 60px;
    margin: auto;
    border: 5px solid #e8e8e8;
    border-top: 5px solid #0057b8;
    border-radius: 50%;
    animation: spin .8s linear infinite;
}

.loader-text{
    margin-top: 18px;
    font-size: 16px;
    color: #444;
    font-weight: 500;
    letter-spacing: 1px;
}

/* Animation */
@keyframes spin{
    to{
        transform: rotate(360deg);
    }
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(15px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.cart_top img {
    max-width: 80%;
}

        
.productContent a.addcart {
    width: 65%;
    font-weight: 400;
    padding: 3px 0;
    font-size: 12px;
}

.findmap {
    background: #638acb36;
    padding: 7px 10px;
    border-radius: 25px;
    color: #00ffb1 !important;
    transition: 0.5s all;
}

.footer-logo img {
    max-width: 135px;
    display: inline-block;
    margin-bottom: 28px;
}




ul.cartListMedia li {
    display: flex;
    margin: 20px 0;
    justify-content: space-between;
}


.product-thumb{
    position: relative;
    display: block;
    overflow: hidden;
}

.product-thumb img{
    width: 100%;
    display: block;
    transition: .4s ease;
}

.product-thumb .hover-img{
    position: absolute;
    inset: 0;
    opacity: 0;
    transform: scale(1.08);
}

.product-card:hover .main-img{
    opacity: 0;
}

.product-card:hover .hover-img{
    opacity: 1;
}
.productContent {
    display: none;
}

.site-footer a {
    color: #ffffff;
}
.site-footer {
    background: #083c93;
    color: #fbfbfb;
}

/* Footer contact: one item per line on desktop, single compact line on mobile */
.footer-line .footer-item {
    display: block;
}
@media (max-width: 767px) {
    .site-footer {
        padding: 1.5rem 0 1rem;
    }
    .site-footer .footer-logo img {
        max-width: 100px;
        margin-bottom: 12px;
    }
    .site-footer .footer-social {
        margin-bottom: 1rem !important;
    }
    .footer-contact {
        --bs-gutter-y: .9rem;
    }
    .footer-contact h6 {
        margin-bottom: .3rem;
        font-size: 14px;
    }
    /* shrinks on very narrow phones so the single line never overflows */
    .footer-line {
        font-size: min(12.5px, 3.6vw);
        white-space: nowrap;
    }
    .footer-line .footer-item {
        display: inline;
    }
    .footer-sep .footer-item + .footer-item::before {
        content: "|";
        margin: 0 6px;
        color: #9fb6e6;
    }
    .footer-contact .findmap {
        margin-top: .4rem !important;
        padding: 4px 10px;
    }
    .site-footer .footer-bottom {
        margin-top: 1.2rem;
        padding-top: .8rem;
    }
}
.trusted-slider {
    padding: 10px 0;
}

.trusted-section {
    padding: 0rem 0 0rem;
}

    .headerMidPart.sticky{
    position: fixed;
    top: 30px;
    left: 0;
    width: 100%;
    background: #fff;
    box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
    animation: slideDown .35s ease;
        z-index: 9999;
    }

    .product-name {
        min-height: 0 !important;
    }
.product-cat {
    min-height: 0;
}
.product-name {
    margin: 0;
    margin-bottom: 5px;
}
.productContent a.addcart {
    margin: 2px auto;
}

body.overflow-hidden {
    overflow: hidden !important;
    height: 100vh !important;
}



.cartInput {
    height: 25px;
    margin-right: 0;
}

ul.cartListMedia li .price {
    font-weight: 400;
    padding: 0px 0;
    color: #838383;
    font-size: 14px;
}

.cartInput span {
    width: 15px;
}


.cartListMedia li img {
    width: 60px;
    margin-right: 6px;
    height: 60px;
}

.title {
    font-size: 14px;
}

ul.cartListMedia li .remove {
      width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 4px;
}


.item {
    display: flex;
    align-items: center;
}


.cartFoter h4 {
    font-size: 16px;
}

.cartFoter h5 {
    font-size: 16px;
}
.cartFooter {
    background: #ffffff;
}

.sidcartButton a {
    display: block;
    width: 100%;
    text-align: center;
    padding: 10px;
    border-radius: 0;
    margin-right: 10px;
}

.sidcartButton {
    display: flex;
    margin-top: 25px;
}

.cartFoter {
    border-bottom: 1px solid lightgray;
    padding-bottom: 15px;
}


.side-modals.right.open-side {
    right: 0 !important;
}

.side-modals.right {
    right: -300px !important;
    height: 100vh;
    width: 300px;
    top: 0;
}

.checkOut {
    box-shadow: 4px 4px 10px 5px #dbd8d844;
}

.checkOut h4 {
    font-weight: 500;
    font-size: 20px;
    text-transform: uppercase;
}

.order_review h4 {
    font-weight: 500;
    font-size: 20px;
    text-transform: uppercase;
}
.orderSummryTable th {
    font-weight: 500;
    font-size: 14px !important;
        text-transform: uppercase;
}

.orderSummryTable td {
    font-size: 12px;
}
.step-title {
    font-size: 18px !important;
    font-weight: 400 !important;
    
}
.progress-step.active .step-title {
    font-weight: 400 !important;
}





/* ================================ WhatsApp Floating Button ================================ */
.whatsapp-float {
    position: fixed;
    right: 25px;
    bottom: 25px;
    width: 58px;
    height: 58px;
    background: #25d366;
    color: #fff !important;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none !important;
    z-index: 99999;
    box-shadow: 0 8px 25px rgba(37, 211, 102, 0.35);
    transition: all 0.3s ease;
} /* WhatsApp Icon */
.whatsapp-icon {
    font-size: 31px;
    line-height: 1;
    display: flex;
    align-items: center;
    justify-content: center;
} /* Pulse Animation */
.whatsapp-float::before,
.whatsapp-float::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    border: 2px solid #25d366;
    border-radius: 50%;
    animation: whatsappPulse 2s infinite;
    z-index: -1;
}
.whatsapp-float::after {
    animation-delay: 0.8s;
}
@keyframes whatsappPulse {
    0% {
        transform: scale(1);
        opacity: 0.8;
    }
    100% {
        transform: scale(1.7);
        opacity: 0;
    }
} /* Hover Effect */
.whatsapp-float:hover {
    transform: translateY(-5px) scale(1.08);
    background: #20bd5a;
    box-shadow: 0 12px 35px rgba(37, 211, 102, 0.5);
} /* Tooltip */
.whatsapp-tooltip {
    position: absolute;
    right: 70px;
    top: 50%;
    transform: translateY(-50%) translateX(10px);
    background: #222;
    color: #fff;
    padding: 8px 13px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 500;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
} /* Tooltip Arrow */
.whatsapp-tooltip::after {
    content: "";
    position: absolute;
    right: -6px;
    top: 50%;
    transform: translateY(-50%);
    border-width: 6px 0 6px 6px;
    border-style: solid;
    border-color: transparent transparent transparent #222;
}
.whatsapp-float:hover .whatsapp-tooltip {
    opacity: 1;
    visibility: visible;
    transform: translateY(-50%) translateX(0);
} /* Mobile */
@media (max-width: 576px) {
    .whatsapp-float {
        width: 52px;
        height: 52px;
        right: 15px;
        bottom: 15px;
    }
    .whatsapp-icon {
        font-size: 27px;
    }
    .whatsapp-tooltip {
        display: none;
    }
}













        </style>
        
        @stack('css')
        
    </head>
    
    <body>
            
        <!--Header Part Include Start-->
        @include(general()->theme.'.layouts.header')

        <!--Main Section Start-->
        @yield('contents')
        <!--Main Section End-->
        
        <!--Footer Part Include Start-->
        @include(general()->theme.'.layouts.footer')
        
        <div class="mobile-menu-side-modals side-modals left">
         <a href="javascript:void(0)" class="overlay side-modals-close"></a>
            <div class="cartAreaSection">
            @include(general()->theme.'.layouts.cartModal')
            </div>
        </div>
        
        
        <!-- WhatsApp Floating Button -->
        <a
            href="https://wa.me/8801722955573"
            class="whatsapp-float"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Chat with us on WhatsApp"
        >
            <span class="whatsapp-tooltip">Chat with us</span>
            <span class="whatsapp-icon"> <i class="fa-brands fa-whatsapp"></i> </span>
        </a>


        
        
        
        <!-- Website Loader -->
        <div id="pageLoader">
            <div class="loader-content">
                <img src="{{assetUrl(general()->logo())}}" alt="SKY Pacific NIT" class="loader-logo">
        
                <div class="spinner"></div>
        
                <p class="loader-text">Loading...</p>
            </div>
        </div>
            
        <div class="cartAreaSection2">
        @include(general()->theme.'.layouts.checkoutModal')
        </div>
        
         <div class="mobileFixedFooter">
            <ul>
                <li>
                    <a href="{{route('index')}}">
                        <i class="fa fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="https://ajlseafoodbd.com/product/category/all-sea-foods">
                        <i class="fa fa-th" aria-hidden="true"></i>
                        <span>All Products</span>
                    </a>
                </li>
                <!--<li>-->
                <!--    @if(Auth::check())-->
                <!--    <a href="{{route('customer.dashboard')}}">-->
                <!--        <i class="fa fa-user"></i>-->
                <!--        <span>Login</span>-->
                <!--    </a>-->
                <!--    @else-->
                <!--    <a href="{{route('login')}}">-->
                <!--        <i class="fa fa-user"></i>-->
                <!--        <span>Login</span>-->
                <!--    </a>-->
                <!--    @endif-->
                <!--</li>-->
                <li>
                    <a href="javascript:void(0)" class="moble-menus-models">
                        <div>
                            <i class="fa fa-shopping-bag"></i>
                            <span class="cart-count">@isset($cartsCount){{$cartsCount}}@endisset</span>
                        </div>
                        <span>Cart</span>
                    </a>
                </li>
                <!--<li>-->
                <!--    <a href="{{route('myWishlist')}}">-->
                <!--        <div>-->
                <!--            <i class="fa fa-heart-o"></i>-->
                <!--            <span class="wish-count">0</span>-->
                <!--        </div>-->
                <!--        <span>Wishlist</span>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="ms">
                    <a href="javascript:void(0)" onclick="openSearch()" >
                        
                        <i class="fa fa-search"></i>
                         <span>Search</span>
                        </a>
                </li>
                
            </ul>
        </div>
        
        <!-- Jquery Script  CDN-->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.js"></script>
        
        <!-- Bootstrap Script  CDN-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- Metis Menus Script -->
        <script src="{{assetUrl(assetLink().'/js/metisMenu.min.js')}}"></script>

        <!-- Sweet Alert CDN -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!-- Slick slider CDN -->
        <script type="text/javascript" src="{{assetUrl(assetLink().'/js/slick.min.js')}}"></script>

        <!--iconify Script CDN-->
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

        <!-- Custom Script for this Design -->
        <script src="{{assetUrl(assetLink().'/js/myScript.js')}}"></script>
        
        <script type="text/javascript" src="{{assetUrl(assetLink().'/wow/wowslider.js')}}"></script>
        <script type="text/javascript" src="{{assetUrl(assetLink().'/wow/script.js')}}"></script>
        
          <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  
  
<script>
$(document).ready(function () {

    $("body").addClass("overflow-hidden");

    setTimeout(function () {
        $("#pageLoader").addClass("hide");

        setTimeout(function () {
            $("#pageLoader").remove();
            // লোডার রিমুভ হওয়ার পর বডি থেকে ক্লাস সরিয়ে স্ক্রল আবার চালু করা
            $("body").removeClass("overflow-hidden");
        }, 500);

    }, 300); // A
    
    
        // Intersection Observer ইমেজ ও সেকশন ভিজিবিলিটি ট্র্যাক করার জন্য
        // exposed on window since other pages (e.g. index.blade.php) call this
        // from outside this ready() closure
        window.initLazyLoading = function() {
            const observerOptions = {
                root: null,
                rootMargin: '200px 0px', // স্ক্রিনে আসার ২০০ পিক্সেল আগেই ইমেজ লোড শুরু হবে
                threshold: 0.01
            };
    
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                        }
                        observer.unobserve(img);
                    }
                });
            }, observerOptions);
    
            $('#productGrid img[data-src]').each(function() {
                observer.observe(this);
            });
        }
    
    

});
</script>



        
        
        <script>
            $(function () {

    var header = $('.header-wrapper');
    var header2 = $('.headerMidPart');
    var offset = header.offset().top;

    $(window).on('scroll', function () {

        if ($(this).scrollTop() > offset) {
            header.addClass('sticky');
            header2.addClass('sticky');
        } else {
            header.removeClass('sticky');
            header2.removeClass('sticky');
        }

    });

});
        </script>
        
        
        
      <script>
          $('.trusted-slider').slick({
    slidesToShow: 10,
    slidesToScroll: 1,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 2000,
    cssEase: 'linear',
    arrows: false,
    dots: false,
    pauseOnHover: true,
    pauseOnFocus: true,

    responsive: [
        {
            breakpoint: 1400, // Laptop
            settings: {
                slidesToShow: 6
            }
        },
        {
            breakpoint: 1200, // Small Laptop
            settings: {
                slidesToShow: 5
            }
        },
        {
            breakpoint: 992, // Tablet
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 768, // Mobile
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 576, // Small Mobile
            settings: {
                slidesToShow: 2
            }
        }
    ]
});
      </script>
        
        
        
        
        
        <script>
              $(document).ready(function () {
                var quantitiy = 0;
                $("#increment").click(function (e) {
                  e.preventDefault();
                    var quantity = parseInt($("#quantity").val()) || 0;
                    $("#quantity").val(quantity + 1);
                    weightCalculate(quantity);
                });

                $("#decrement").click(function (e) {
                  e.preventDefault();
                  var quantity = parseInt($("#quantity").val()) || 1;
                  if (quantity > 1) {
                    $("#quantity").val(quantity - 1);
                  }
                    weightCalculate(quantity);
                });

                // Typed quantity: digits only, falls back to 1 when left empty/0
                $("#quantity").on("input", function () {
                    this.value = this.value.replace(/[^0-9]/g, "");
                });
                // Enter would submit the surrounding cart form as a full page post
                $("#quantity").on("keydown", function (e) {
                    if (e.key === "Enter") {
                        e.preventDefault();
                        $(this).blur();
                    }
                });
                $("#quantity").on("blur", function () {
                    if (!(parseInt(this.value) > 0)) {
                        this.value = 1;
                    }
                    this.value = parseInt(this.value);
                });


                function weightCalculate(quantity){
                    var weight = parseFloat($('.NetWeight').data('weight'));
                    var ice = parseFloat($('.grossWeight').data('weight'));
                    
                    var newQuantity = quantity + 1;
                    
                    var grossWeight = ((weight + ice) * newQuantity).toFixed(2) + ' KG';
                    var netWeight = (weight * newQuantity).toFixed(2) + ' KG';
                    console.log(weight);
                    console.log(ice);
                    console.log(ice);
                    console.log(grossWeight);
                    $('.grossWeight').empty().append(grossWeight);
                    $('.NetWeight').empty().append(netWeight);
                }
                
                
              });
        </script>
        
        
        <script>
          $(document).ready(function(){
            $(".toggleButton").click(function(){
              // Hide all contents
              $(".toggle-content").slideUp();
              $(".toggleButton .icon").text("+");
        
              // Show clicked content if it's not already visible
              var content = $(this).next(".toggle-content");
              if(!content.is(":visible")) {
                content.slideDown();
                $(this).find(".icon").text("−");
              }
            });
          });
        </script>
        
        
        
        
        <script>
            $(document).ready(function(){
                
                $(document).on('click','.discountApply .apply',function(){
                    var code =$('.discountApply input').val();
                    var areaId =$('#district2').val();
                    var cityId =$('#city2').val();
                    if(code=='' || code=='undefined' || code==null){
                        $('.discountApply .couponErro').empty().append('<span style="color:red;">Input Coupon Code here..</span>');
                    }else{
                        
                        var url = "{{route('couponApply')}}";
                        
                        $.ajax({
                            url: url,
                            method: "POST",
                            data: {
                                coupon_code: code,
                                areaId: areaId,
                                cityId: cityId,
                                _token: "{{ csrf_token() }}" // Laravel CSRF token
                            },
                        })
                        .done(function (data) {
                            if(data.status=='success'){
                                $('.discountApply .couponErro').empty().append('<span style="color:green;">'+data.message+'</span>');
                                $('.cartItemsTotal').empty().append(data.view2);
                            }else{
                               $('.discountApply .couponErro').empty().append('<span style="color:red;">'+data.message+'</span>'); 
                            }
                            
                        })
                        .fail(function () {
                            //location.reload(true);
                        });
                        
                    }
                });
                
                $(document).on('keyup','.discountApply input',function(){
                    $('.discountApply .couponErro').empty();
                });
                
                $('.downMenus i').click(function(){
                    // $(this).parent().toggleClass('active');
                    const $li = $(this).parent();
                    const $ul = $li.parent().children('ul');
                    $li.toggleClass('active');
                    if ($li.hasClass('active')) {
                       $ul.slideDown();
                    } else {
                       $ul.slideUp();
                    }
                });
                
                
                 /** Mobile sidebar Menus  js **/
                $('.moble-menus-models').click(function(){
                  $('.mobile-menu-side-modals').addClass('open-side');
                  $("body").css('overflow-y','hidden');
                  viewCartDataCall();
                  
                });
                
                $('.moble-menus-models2').click(function(){
                  $('.mobile-menu-side-modals2').addClass('open-side');
                  $("body").css('overflow-y','hidden');
                  viewCartDataCall();
                  
                });
            
                $(document).on('click','.side-modals-close',function(){
                  $('.side-modals').removeClass('open-side');
                  $("body").css('overflow-y','');
                })
                /** Mobile sidebar Menus  js **/
                
                /** CSRF Token Header Set **/
                $.ajaxSetup({
            	    headers: {
            	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            	    }
            	});
            	
            	$(document).on("click", ".btn-wishlist", function () {
            	    var that =$(this);
                    var id = that.attr("data-id");
                    var url = that.attr("data-url");
                    $.ajax({
                        url: url,
                        method: "GET",
                        beforeSend: function() {
                            $(that).find('.load-more-overlay').addClass('loading');
                        },
                    })
                    .done(function (data) {
                        $(that).find('.load-more-overlay').removeClass('loading');
                        if(data.status){
                            $(that).addClass('active');
                        }else{
                            $(that).removeClass('active');
                        }
                        $(".wishlist-count").empty().append(data.count);
                        $('.mywishList').empty().append(data.itemsView);
                    })
                    .fail(function () {
                        $(that).find('.load-more-overlay').removeClass('loading');
                        //location.reload(true);
                    });

            	});
            	$(document).on("click", ".btn-cart", function () {
            	    var that =$(this);
                    var id = that.attr("data-id");
                    var url = that.attr("data-url");
                    
                    $.ajax({
                        url: url,
                        method: "GET",
                        beforeSend: function() {
                            $(that).find('.load-more-overlay').addClass('loading');
                        },
                    })
                    .done(function (data) {
                        $('.mobile-menu-side-modals').addClass('open-side');
                        $("body").css('overflow-y','hidden');
                        $(that).find('.load-more-overlay').removeClass('loading');
                        $(".cart-count").empty().append(data.cartCount);
                        $(".cartAreaSection").empty().append(data.cartItem);
                        $(".cartAreaSection2").empty().append(data.cartItem2);
                    })
                    .fail(function () {
                        $(that).find('.load-more-overlay').removeClass('loading');
                        // location.reload(true);
                    });
            	    
            	});
            	
            	$(document).on("click", ".orderModalAction", function () {
  
            	    beginCheckout();
            	});
            	
            	$(document).on("click", ".cartUpdate", function () {
            	    var that =$(this);
                    var url = that.attr("data-url");
                    $.ajax({
                        url: url,
                        method: "GET",
                    })
                    .done(function (data) {
                        $(".cart-count").empty().append(data.cartCount);
                        $('.cartItemsAll').empty().append(data.cartItems);
                        $(".cartAreaSection").empty().append(data.cartItem);
                        $(".cartAreaSection2").empty().append(data.cartItem2);
                    })
                    .fail(function () {
                       // location.reload(true);
                    });
            	});
            	
            	$(document).on("change", "#district2", function(){
                    var id = $(this).val();
                      if(id==''){
                       $('#city2').empty().append('<option value="">No City</option>');
                      }else{
                          var url = '{{url("/checkout")}}?areaId='+id;
                          $.get(url,function(data){
                            $('#city2').empty().append(data.geoData);
                            $('.orderSummryTable').empty().append(data.view);
                            $('.cartItemsTotal').empty().append(data.view2);
                          });  
                      }
                });
                
                $(document).on("change", "#city2", function(){
                        var area = $('#district2').val();
                        var id = $(this).val();
                      if(id=='' || area==''){
                       //$('#city').empty().append('<option value="">No City</option>');
                      }else{
                          var url = '{{url("/checkout")}}?areaId='+area+'&cityId='+id;
                          $.get(url,function(data){
                            $('.orderSummryTable').empty().append(data.view);
                            $('.cartItemsTotal').empty().append(data.view2);
                          });  
                      }
                });
                
                let typingTimer2;
                $(document).on('keyup','.valuecheck3',function(){
                    clearTimeout(typingTimer2);
                    var url ="{{route('incompletedOrder')}}";
                    var mobile2 =$('.mobileNumberInput2').val() || '';
                    mobile2 = mobile2.replace(/^\+88/, '');
                    mobile2 = mobile2.replace(/^88/, '');
                    if(mobile2.length ==11){
                        typingTimer2 = setTimeout(function () {
                            var data =$(".checkout-form2").serialize();
                            $.ajax({
                                url: url,
                                method: "GET",
                                data: data,
                                success: function (res) {
                                    console.log(res);
                                }
                            });
                            
                        }, 1000);
                    }
                });
                
            	
            	$(document).on('click','.subsriberbtm',function(e){
            	    
                    e.preventDefault();
                    var url = $('#subscirbeForm').data('url');
                    var formData =$('#subscirbeForm').serialize();
                    if(validateEmail()){
                        $.ajax({
                          url: url,
                          type: 'POST',
                          dataType: 'json',
                          data: formData,
                          cache: false,
                        })
                        .done(function(data) {
                            if(data.success)
                              {
                                $("#subscribeemailMsg").html("<span style='background: #00baa3;padding: 5px 15px;'>"+ data.message +"</span>");
                                $("#subscirbeForm")[0].reset();
                              }else{
                                $("#subscribeemailMsg").html("<span style='background: #ffc107;padding: 5px 15px;'>"+ data.message +"</span>");
                              }
                        })
                        .fail(function() {
                          // alert("error");
                        });
                    }else{ 
                        $("#subscribeemailMsg").html("<span style='background: #e52734;padding: 5px 15px;'>Please Write a Verified Email</span>");
                    }
        
            });
        
            function validateEmail(){
                  var subscribeEmail=$("#subscribeEmail").val();
                   var reg =/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                   if(reg.test(subscribeEmail)){
                      return true;
                   }else{
                      return false;
              }
            }
            	
                
            });
        </script>
        
        <script>
            function openSearch() {
              document.getElementById("myOverlay").style.display = "block";
            }

            function closeSearch() {
              document.getElementById("myOverlay").style.display = "none";
            }
        </script>

        <!-- Live Search Suggestions (header search box) -->
        <script>
            $(function () {

                var searchTimer;
                var searchUrl = "{{route('productSearch')}}";

                $(document).on('keyup', '.liveSearchInput', function () {

                    var $input = $(this);
                    var $resultBox = $input.closest('form').siblings('.SearchResult');
                    var keyword = $input.val().trim();

                    clearTimeout(searchTimer);

                    if (keyword.length < 2) {
                        $resultBox.hide().empty();
                        return;
                    }

                    searchTimer = setTimeout(function () {
                        $.ajax({
                            url: searchUrl,
                            method: 'GET',
                            data: { search: keyword },
                        })
                        .done(function (html) {
                            $resultBox.html(html).show();
                        });
                    }, 350);

                });

                // Hide the dropdown when clicking anywhere outside the search box
                $(document).on('click', function (e) {
                    if (!$(e.target).closest('.searchDiv, .searchDiv1').length) {
                        $('.SearchResult').hide();
                    }
                });

                // Show previous results again if the input still has a value
                $(document).on('focus', '.liveSearchInput', function () {
                    var $resultBox = $(this).closest('form').siblings('.SearchResult');
                    if ($(this).val().trim().length >= 2 && $resultBox.html().trim() !== '') {
                        $resultBox.show();
                    }
                });

            });
        </script>

        @stack('js')
        
    </body>
</html>

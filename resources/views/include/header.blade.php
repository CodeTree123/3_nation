<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/home2-default.html   11 Nov 2019 12:22:28 GMT -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>3 Nation BD</title>
  <meta name="description" content="description">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('assets/images/final_logo_icon.png') }}"/>
  <!-- Plugins CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/plugins.css') }}">
  <!-- Bootstap CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css') }}">
  <!-- Main Style CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{asset('assets/css/responsive.css') }}">
</head>
 




<body class="template-index home2-default template-product-right-thumb template-product template-product-right-thumb belle">
  <!-- <div id="pre-loader">
    <img src="assets/images/loader.gif" alt="Loading..." />
</div> -->
  <div class="pageWrapper">
    <!--Promotion Bar-->
    <!-- <div class="notification-bar mobilehide">
    	<a href="#" class="notification-bar__message">20% off your very first purchase, use promo code: belle fashion</a>
        <span class="close-announcement">×</span>
    </div> -->
    <!--End Promotion Bar-->
    <!--Search Form Drawer-->
    <div class="search">
      <div class="search__form">
        <form class="search-bar__form" action="#">
          <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
          <input class="search__input" type="search" name="q" value="" placeholder="Search ..." aria-label="Search" autocomplete="off">
        </form>
        <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
      </div>
    </div>
    <!--End Search Form Drawer-->
    <!--Top Header-->
    <div class="top-header">
      <div class="container-fluid">
        <div class="row justify-content-between">
          <div class="col-10 col-sm-8 col-md-5 col-lg-4">
            <p class="phone-no"><i class="anm anm-phone-s"></i> 001897658463</p>
          </div>

          <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
            <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
            <ul class="customer-links list-inline">
              @if(Auth::guest())
              <li><a href="{{route('login_view')}}">Login</a></li>
              <li><a href="{{route('register_view')}}">Create Account</a></li>
              @else
                @if(Auth::user())
                <li>
                  <div class="dropdown">
                    <p class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                      {{Auth::user()->email}}
                    </p>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('profile')}}">My Profile</a>
                      <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                    </div>
                  </div>
                </li>
                @endif
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--End Top Header-->
    <!--Header-->
    <div class="header-wrap animated d-flex border-bottom">
      <div class="container-fluid">
        <div class="row align-items-center">
          <!--Desktop Logo-->
          <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
            <a href="/">
              <img src="{{asset('assets/images/logo_final.png')}}" alt="3 Nation BD" title="3 Nation BD" />
            </a>
          </div>
          <!--End Desktop Logo-->
          <div class="col-2 col-sm-3 col-md-3 col-lg-8">
            <div class="d-block d-lg-none">
              <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                <i class="icon anm anm-times-l"></i>
                <i class="anm anm-bars-r"></i>
              </button>
            </div>
            <!--Desktop Menu-->
            <nav class="grid__item" id="AccessibleNav">
              <!-- for mobile -->
              <ul id="siteNav" class="site-nav medium center hidearrow">
                <li class="lvl1 parent megamenu">
                  <a href="/">Home </a>
                </li>
                <!-- Branch -->
                @foreach($branches as $branch)
                <li class="lvl1 parent megamenu">
                  <a href="#">{{$branch->branch_name}} <i class="anm anm-angle-down-l"></i></a>
                  <div class="megamenu style4">

                    <ul class="grid grid--uniform mmWrapper">
                      @foreach($catagories as $catagory)
                      @if($catagory->branch_id == $branch->id)
                      <li class="grid__item lvl-1 col-md-3 col-lg-3">
                        <p class="site-nav lvl-1 mb-0">{{$catagory->catagory_name}}</p>

                        <ul class="subLinks">
                          @foreach($subcatagories as $subcatagory)
                          @if($subcatagory->cat_id == $catagory->id)
                          <li class="lvl-2">
                            <a href="{{route('shop_main_category',[$subcatagory->id])}}" class="site-nav lvl-2">
                              {{$subcatagory->subcatagory_name}}
                            </a>
                          </li>
                          @endif
                          @endforeach
                        </ul>
                      </li>
                      @endif
                      @endforeach
                    </ul>
                  </div>
                </li>
                @endforeach
            </nav>
            <!--End Desktop Menu-->
          </div>
          <!--Mobile Logo-->
          <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
            <div class="logo">
              <a href="/">
                <img src="assets/images/logo_final.png" alt="3 Nation BD" title="3 Nation BD" />

              </a>
            </div>
          </div>
          <!--Mobile Logo-->
          <div class="col-4 col-sm-3 col-md-3 col-lg-2">
            <div class="site-cart">
              <a href="#" class="site-header__cart" title="Cart">
                <i class="icon anm anm-bag-l"></i>
                <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count">2</span>
              </a>
              <!--Minicart Popup-->
              <div id="header-cart" class="block block-cart">
                <ul class="mini-products-list">
                  <li class="item">
                    <a class="product-image" href="#">
                      <img src="assets/images/product-images/cape-dress-1.jpg" alt="3/4 Woman Dress 7" title="" />
                    </a>
                    <div class="product-details">
                      <a href="#" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                      <a href="#" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                      <a class="pName" href="">Woman Dress 7</a>
                      <div class="variant-cart">Black / XL</div>
                      <div class="wrapQtyBtn">
                        <div class="qtyField">
                          <span class="label">Qty:</span>
                          <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                          <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                          <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                        </div>
                      </div>
                      <div class="priceRow">
                        <div class="product-price">
                          <span class="money">৳600.00</span>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="item">
                    <a class="product-image" href="#">
                      <img src="assets/images/product-images/cape-dress-2.jpg" alt="Woman Dress 8 - Black / Small" title="" />
                    </a>
                    <div class="product-details">
                      <a href="#" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                      <a href="#" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                      <a class="pName" href="">Woman Dress 8</a>
                      <div class="variant-cart">Gray / XXL</div>
                      <div class="wrapQtyBtn">
                        <div class="qtyField">
                          <span class="label">Qty:</span>
                          <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                          <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                          <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                        </div>
                      </div>
                      <div class="priceRow">
                        <div class="product-price">
                          <span class="money">৳700.00</span>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="total">
                  <div class="total-in">
                    <span class="label">Cart Subtotal:</span><span class="product-price"><span class="money">৳1300.00</span></span>
                  </div>
                  <div class="buttonSet text-center">
                    <a href="/cart_list" class="btn btn-secondary btn--small">View Cart</a>
                    <a href="/checkout" class="btn btn-secondary btn--small">Checkout</a>
                  </div>
                </div>
              </div>
              <!--End Minicart Popup-->
            </div>
            <div class="site-header__search">
              <button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End Header-->

    <!--Mobile Menu-->
    <div class="mobile-nav-wrapper" role="navigation">
      <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
      <ul id="MobileNav" class="mobile-nav">
        <li class="lvl1 parent megamenu"><a href="/">Home</a></li>
        <li class="lvl1 parent megamenu"><a href="/">Men <i class="anm anm-plus-l"></i></a>
          <ul>
            <li><a href="#" class="site-nav">Men Shirts<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="/" class="site-nav">Casual Shirt Full</a></li>
                <li><a href="" class="site-nav"> Casual Shirt Half</a></li>
                <li><a href="" class="site-nav"> Formal Shirt Full </a></li>
                <li><a href="" class="site-nav"> Slim Fit Shirt</a></li>
                <li><a href="" class="site-nav"> Fatua</a></li> 
              </ul>
            </li>
            <li><a href="#" class="site-nav">Men Pants<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="" class="site-nav"> Denim/Jeans</a></li>
                <li><a href="" class="site-nav"> Short Pant</a></li>
                <li><a href="" class="site-nav"> Cotton Pant</a></li>
                <li><a href="" class="site-nav"> Trouser</a></li> 
              </ul>
            </li>
            <li><a href="#" class="site-nav">Accessories<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="home11-grid.html" class="site-nav"> Sneakers</a></li>
                <li><a href="home5-cosmetic.html" class="site-nav"> Converse</a></li> 
              </ul>
            </li>
            <li><a href="#" class="site-nav">T-SHIRT & POLO SHIRTS<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="home13-" class="site-nav"> T-Shirt Half </a></li>
                <li><a href="#" class="site-nav"> Polo Shirt Half </a></li> 
              </ul>
            </li>
            <li><a href="#" class="site-nav">MEN PANJABI'S<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="#" class="site-nav"> Mens Kabli </a></li>
                <li><a href="#" class="site-nav"> Regular Fit Panjabi </a></li>
                <li><a href="#" class="site-nav"> Mens Paijama</a></li>
                <li><a href="#" class="site-nav"> Exclusive Panjabi</a></li>
                <li><a href="#" class="site-nav"> Slim Fit Panjabi </a></li> 
              </ul>
            </li>
          </ul>
        </li>
        <li class="lvl1 parent megamenu"><a href="#">Women <i class="anm anm-plus-l"></i></a>
          <ul>
            <li><a href="#" class="site-nav">READY-TO-WEAR<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="/shop_main_category" class="site-nav"> Tops Long</a></li>
                <li><a href="#" class="site-nav"> Ladies Pant</a></li>
                <li><a href=" " class="site-nav"> Tops Short</a></li>
                <li><a href="#" class="site-nav"> Ladies Jeans</a></li>
                <li><a href="#" class="site-nav"> Leggins</a></li>
                <li><a href="#" class="site-nav">Ladies Palazzo</a></li> 
              </ul>
            </li>
            <li><a href="#" class="site-nav">WOMEN SHIRTS<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="#" class="site-nav"> Ladies Fatua </a></li>
                <li><a href="#" class="site-nav"> Ladies Shirt</a></li> 
              </ul>
            </li>
          </ul>
        </li>
        <li class="lvl1 parent megamenu"><a href="#">KIDS <i class="anm anm-plus-l"></i></a>
          <ul>
            <li><a href="#" class="site-nav">KIDS BOY<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="#" class="site-nav"> Kids KABLI (1-4 years)</a></li>
                <li><a href="#" class="site-nav"> Kids KABLI (5 years & above)</a></li>
                <li><a href="#" class="site-nav"> Kids Panjabi</a></li>
                <li><a href="#" class="site-nav"> Kids Polo Shirt Half (1-4 years)</a></li>
                <li><a href="#" class="site-nav"> Kids Polo Shirt Half (5 years & above)</a></li>
                <li><a href="#" class="site-nav last"> Kids Shirt Full (1-4 years)</a></li>
              </ul>
            </li>
            <li><a href="#" class="site-nav">KIDS GIRL<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="#" class="site-nav"> Kids Frock (1-4 years)</a></li>
                <li><a href="#" class="site-nav"> Kids Frock (5 years & above</a></li> 
              </ul>
            </li>
            
          </ul>
        </li>
        <!-- <li class="lvl1 parent megamenu"><a href="about-us.html">Pages <i class="anm anm-plus-l"></i></a>
          <ul>
            <li><a href="cart-variant1.html" class="site-nav">Cart Page <i class="anm anm-plus-l"></i></a>
              <ul class="dropdown">
                <li><a href="cart-variant1.html" class="site-nav">Cart Variant1</a></li>
                <li><a href="cart-variant2.html" class="site-nav">Cart Variant2</a></li>
              </ul>
            </li>
            <li><a href="compare-variant1.html" class="site-nav">Compare Product <i class="anm anm-plus-l"></i></a>
              <ul class="dropdown">
                <li><a href="compare-variant1.html" class="site-nav">Compare Variant1</a></li>
                <li><a href="compare-variant2.html" class="site-nav">Compare Variant2</a></li>
              </ul>
            </li>
            <li><a href="checkout.html" class="site-nav">Checkout</a></li>
            <li><a href="about-us.html" class="site-nav">About Us<span class="lbl nm_label1">New</span></a></li>
            <li><a href="contact-us.html" class="site-nav">Contact Us</a></li>
            <li><a href="faqs.html" class="site-nav">FAQs</a></li>
            <li><a href="lookbook1.html" class="site-nav">Lookbook<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="lookbook1.html" class="site-nav">Style 1</a></li>
                <li><a href="lookbook2.html" class="site-nav last">Style 2</a></li>
              </ul>
            </li> 
          </ul>
        </li> -->
         
      </ul>
    </div>
    <!--End Mobile Menu-->
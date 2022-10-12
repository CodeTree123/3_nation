
    @include('include.header')
    <!--Body Content-->
    <div id="page-content">
    	<!--Home slider-->
    	<div class="slideshow slideshow-wrapper pb-section">
        	<div class="home-slideshow">
            	<div class="slide">
                	<div class="blur-up lazyload">
                        <img class="blur-up lazyload" data-src="assets/images/slideshow-banners/home2-default-banner1.jpg" src="assets/images/slideshow-banners/home2-default-banner1.jpg" alt="Shop Our New Collection" title="Shop Our New Collection" />
                        <div class="slideshow__text-wrap slideshow__overlay classic middle">
                            <div class="slideshow__text-content middle">
                            	<div class="container">
                                    <div class="wrap-caption right">
                                        <h2 class="h1 mega-title slideshow__title">Our New Collection</h2>
                                        <span class="mega-subtitle slideshow__subtitle">Save up to 50% Off</span>
                                        <span class="btn">Shop now</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide">
                	<div class="blur-up lazyload">
                        <img class="blur-up lazyload" data-src="assets/images/slideshow-banners/home2-default-banner2.jpg" src="assets/images/slideshow-banners/home2-default-banner2.jpg" alt="Summer Bikini Collection" title="Summer Bikini Collection" />
                        <div class="slideshow__text-wrap slideshow__overlay classic middle">
                            <div class="slideshow__text-content middle">
                            	<div class="container">
                                    <div class="wrap-caption center">
                                        <h2 class="h1 mega-title slideshow__title">Fashion &amp; Show</h2>
                                        <span class="mega-subtitle slideshow__subtitle">A World Fashion and Trendy Fashion Clother's</span>
                                        <span class="btn">Shop now</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Home slider-->
        <!--Women Bestseller-->
        <div class="section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Women Bestseller</h2>
                            <!-- <p>Our most popular products based on sales</p> -->
                        </div>
						<div class="productSlider grid-products">
                            @forelse($women as $woman)
                            <div class="col-12 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="#" class="grid-view-item__link">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="{{asset('/uploads/product/'.$woman->m_image)}}" src="{{asset('/uploads/product/'.$woman->m_image)}}" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload" data-src="{{asset('/uploads/product/'.$woman->h_image)}}" src="{{asset('/uploads/product/'.$woman->h_image)}}" alt="image" title="product">
                                        <!-- End hover image -->
                                        <!-- Variant Image-->
                                        <img class="grid-view-item__image hover variantImg" src="assets/images/product-images/product-image1.jpg" alt="image" title="product">
                                        <!-- Variant Image-->
                                        <!-- product label -->
                                        <!-- <div class="product-labels rounded"><span class="lbl on-sale">Sale</span> <span class="lbl pr-label1">new</span></div> -->
                                        <!-- End product label -->
                                    </a>
                                    <!-- end product image -->
                                     

                                    <!-- Start product button -->
                                    <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                        <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                                    </form>
                                 
                                    <!-- end product button -->
                                </div>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="#">{{$woman->product_name}}</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <!-- <span class="old-price">৳500.00</span> -->
                                        <span class="price">৳{{$woman->price}}</span>
                                    </div>
                                    <!-- End product price -->
                                   
                                </div>
                                <!-- End product details -->
                            </div>
                            @empty
                            <div class="col-12 item">
                                <!-- start product image -->
                               <h4>There are no product available now.</h4>
                                <!-- End product details -->
                            </div>
                            @endforelse
                        </div>
                    </div>
            	</div>    
            </div>
        </div>
        <!--Weekly Bestseller-->
        <!--Parallax Section-->
        <div class="section">
            <div class="hero hero--large hero__overlay bg-size">
            	<img class="bg-img" src="assets/images/parallax-banners/banner_1.jpg" alt="" />
                <div class="hero__inner">
                    <div class="container">
                        <div class="wrap-text left text-small font-bold">
                            <h2 class="h2 mega-title">3 Nation BD <br> The best choice for your store</h2>
                            <div class="rte-setting mega-subtitle">Some inviting text About the shop</div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Parallax Section-->
          <!--Men Bestseller-->
          <div class="section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Men Bestseller</h2>
                            <!-- <p>Our most popular products based on sales</p> -->
                        </div>
						<div class="productSlider grid-products">
                            @forelse ($men as $man)
                            <div class="col-12 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="#" class="grid-view-item__link">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="{{asset('/uploads/product/'.$man->m_image)}}" src="{{asset('/uploads/product/'.$man->m_image)}}" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload" data-src="{{asset('/uploads/product/'.$man->h_image)}}" src="{{asset('/uploads/product/'.$man->h_image)}}" alt="image" title="product">
                                        <!-- End hover image -->

                                        <!-- product label -->
                                        <!-- <div class="product-labels rounded"><span class="lbl on-sale">Sale</span> <span class="lbl pr-label1">new</span></div> -->
                                        <!-- End product label -->
                                    </a>
                                    <!-- end product image -->
                                     

                                    <!-- Start product button -->
                                    <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                        <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                                    </form>
                                 
                                    <!-- end product button -->
                                </div>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="#">{{$man->product_name}}</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <!-- <span class="old-price">৳500.00</span> -->
                                        <span class="price">৳{{$man->price}}</span>
                                    </div>
                                    <!-- End product price -->
                                   
                                </div>
                                <!-- End product details -->
                            </div>
                            @empty
                            <div class="col-12 item">
                                <!-- start product image -->
                               <h4>There are no product available now.</h4>
                                <!-- End product details -->
                            </div>
                            @endforelse
                        </div>
                    </div>
            	</div>    
            </div>
        </div>
          <!--Men Bestseller End-->
          <!--Kid Bestseller-->
          <div class="section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Kid Bestseller</h2>
                            <!-- <p>Our most popular products based on sales</p> -->
                        </div>
						<div class="productSlider grid-products">
                            @forelse($kids as $kid)
                            <div class="col-12 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="#" class="grid-view-item__link">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="{{asset('/uploads/product/'.$kid->m_image)}}" src="{{asset('/uploads/product/'.$kid->m_image)}}" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload" data-src="{{asset('/uploads/product/'.$kid->m_image)}}" src="{{asset('/uploads/product/'.$kid->m_image)}}" alt="image" title="product">
                                        <!-- End hover image -->
                                    </a>
                                    <!-- end product image -->
                                     

                                    <!-- Start product button -->
                                    <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                        <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                                    </form>
                                 
                                    <!-- end product button -->
                                </div>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="#">{{$kid->product_name}}</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <!-- <span class="old-price">৳500.00</span> -->
                                        <span class="price">৳{{$kid->price}}</span>
                                    </div>
                                    <!-- End product price -->
                                   
                                </div>
                                <!-- End product details -->
                            </div>
                            @empty
                            <div class="col-12 item">
                                <!-- start product image -->
                               <h4>There are no product available now.</h4>
                                <!-- End product details -->
                            </div>
                            @endforelse
                        </div>
                    </div>
            	</div>    
            </div>
        </div>
          <!--Kid Bestseller End-->
        <!--End Featured Product-->
        
        <!--Logo Slider-->
        <!-- <div class="section logo-section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    	<div class="section-header text-center">
                        	<h2 class="h2">The Most Loved Brands</h2>
                    	</div>
                		<div class="logo-bar">
                            <div class="logo-bar__item">
                                <img src="assets/images/logo/brandlogo1.png" alt="" title="" />
                            </div>
                            <div class="logo-bar__item">
                                <img src="assets/images/logo/brandlogo2.png" alt="" title="" />
                            </div>
                            <div class="logo-bar__item">
                                <img src="assets/images/logo/brandlogo3.png" alt="" title="" />
                            </div>
                            <div class="logo-bar__item">
                                <img src="assets/images/logo/brandlogo4.png" alt="" title="" />
                            </div>
                            <div class="logo-bar__item">
                                <img src="assets/images/logo/brandlogo5.png" alt="" title="" />
                            </div>
                            <div class="logo-bar__item">
                                <img src="assets/images/logo/brandlogo6.png" alt="" title="" />
                            </div>
               			 </div>
                	</div>
                </div>
            </div>
        </div> -->
        <!--End Logo Slider-->
    </div>
    <!--End Body Content-->
    
   
    @include('include.footer')
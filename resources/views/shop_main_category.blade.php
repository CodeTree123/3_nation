@include('include.header')

<!--Body Content-->
<div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
        <div class="collection-hero">
            <div class="collection-hero__image" style="height: 150px;"><img class="blur-up lazyload" data-src="{{asset('assets/images/category_banner.jpg')}}" src="{{asset('assets/images/category_banner.jpg')}}" alt="Women" title="Women" /></div>
            <div class="collection-hero__title-wrapper">
                {{--<h1 class="collection-hero__title page-width">{{$subcat->branch_name."Dress"}}</h1>--}}
                {{--<h1 class="collection-hero__title page-width">{{$subcat->catagory_name}}</h1>--}}
                <h1 class="collection-hero__title page-width">{{$subcat->subcatagory_name}}</h1>
            </div>
        </div>
    </div>
    <!--End Collection Banner-->

    <div class="container">
        <div class="row my-4">
            <!--Sidebar-->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                <div class="sidebar_tags">
                    <!--Categories-->
                    <!-- <div class="sidebar_widget categories filter-widget">
                        <div class="widget-title">
                            <h2>Categories</h2>
                        </div>
                        <div class="widget-content">
                            <ul class="sidebar_categories">
                                <li class="level1 sub-level"><a href="#;" class="site-nav">Clothing</a>
                                    <ul class="sublinks">
                                        <li class="level2"><a href="#;" class="site-nav">Men</a></li>
                                        <li class="level2"><a href="#;" class="site-nav">Women</a></li>
                                        <li class="level2"><a href="#;" class="site-nav">Child</a></li>
                                        <li class="level2"><a href="#;" class="site-nav">View All Clothing</a></li>
                                    </ul>
                                </li>
                                <li class="level1 sub-level"><a href="#;" class="site-nav">Jewellery</a>
                                    <ul class="sublinks">
                                        <li class="level2"><a href="#;" class="site-nav">Ring</a></li>
                                        <li class="level2"><a href="#;" class="site-nav">Neckalses</a></li>
                                        <li class="level2"><a href="#;" class="site-nav">Eaarings</a></li>
                                        <li class="level2"><a href="#;" class="site-nav">View All Jewellery</a></li>
                                    </ul>
                                </li>
                                <li class="lvl-1"><a href="#;" class="site-nav">Shoes</a></li>
                                <li class="lvl-1"><a href="#;" class="site-nav">Accessories</a></li>
                                <li class="lvl-1"><a href="#;" class="site-nav">Collections</a></li>
                                <li class="lvl-1"><a href="#;" class="site-nav">Sale</a></li>
                                <li class="lvl-1"><a href="#;" class="site-nav">Page</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <!--Categories-->
                    <!--Price Filter-->
                    <div class="sidebar_widget filterBox filter-widget">
                        <div class="widget-title">
                            <h2>Price</h2>
                        </div>
                        <form action="#" method="post" class="price-filter">
                            <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="no-margin"><input id="amount" type="text"></p>
                                </div>
                                <div class="col-6 text-right margin-25px-top">
                                    <button class="btn btn-secondary btn--small">filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--End Price Filter-->
                    <!--Size Swatches-->
                    <div class="sidebar_widget filterBox filter-widget size-swacthes">
                        <div class="widget-title">
                            <h2>Size</h2>
                        </div>
                        <div class="filter-color swacth-list">
                            <ul>
                                <li><span class="swacth-btn checked">X</span></li>
                                <li><span class="swacth-btn">XL</span></li>
                                <li><span class="swacth-btn">XLL</span></li>
                                <li><span class="swacth-btn">M</span></li>
                                <li><span class="swacth-btn">L</span></li>
                                <li><span class="swacth-btn">S</span></li>
                                <li><span class="swacth-btn">XXXL</span></li>
                                <li><span class="swacth-btn">XXL</span></li>
                                <li><span class="swacth-btn">XS</span></span></li>
                            </ul>
                        </div>
                    </div>
                    <!--End Size Swatches-->
                    <!--Color Swatches-->
                    <div class="sidebar_widget filterBox filter-widget">
                        <div class="widget-title">
                            <h2>Color</h2>
                        </div>
                        <div class="filter-color swacth-list clearfix">
                            <span class="swacth-btn black"></span>
                            <span class="swacth-btn white checked"></span>
                            <span class="swacth-btn red"></span>
                            <span class="swacth-btn blue"></span>
                            <span class="swacth-btn pink"></span>
                            <span class="swacth-btn gray"></span>
                            <span class="swacth-btn green"></span>
                            <span class="swacth-btn orange"></span>
                            <span class="swacth-btn yellow"></span>
                            <span class="swacth-btn blueviolet"></span>
                            <span class="swacth-btn brown"></span>
                            <span class="swacth-btn darkGoldenRod"></span>
                            <span class="swacth-btn darkGreen"></span>
                            <span class="swacth-btn darkRed"></span>
                            <span class="swacth-btn dimGrey"></span>
                            <span class="swacth-btn khaki"></span>
                        </div>
                    </div>
                    <!--End Color Swatches-->
                    <!--Brand-->
                    <!-- <div class="sidebar_widget filterBox filter-widget">
                        <div class="widget-title">
                            <h2>Brands</h2>
                        </div>
                        <ul>
                            <li>
                                <input type="checkbox" value="allen-vela" id="check1">
                                <label for="check1"><span><span></span></span>Allen Vela</label>
                            </li>
                            <li>
                                <input type="checkbox" value="oxymat" id="check3">
                                <label for="check3"><span><span></span></span>Oxymat</label>
                            </li>
                            <li>
                                <input type="checkbox" value="vanelas" id="check4">
                                <label for="check4"><span><span></span></span>Vanelas</label>
                            </li>
                            <li>
                                <input type="checkbox" value="pagini" id="check5">
                                <label for="check5"><span><span></span></span>Pagini</label>
                            </li>
                            <li>
                                <input type="checkbox" value="monark" id="check6">
                                <label for="check6"><span><span></span></span>Monark</label>
                            </li>
                        </ul>
                    </div> -->
                    <!--End Brand-->

                    <!--Banner-->
                    <!-- <div class="sidebar_widget static-banner">
                        	<img src="assets/images/side-banner-2.jpg" alt="" />
                        </div> -->
                    <!--Banner-->


                </div>
            </div>
            <!--End Sidebar-->
            <!--Main Content-->
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">

                <hr>
                <div class="productList product-load-more">
                    <!--Toolbar-->
                    <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                    <div class="toolbar">
                        <div class="filters-toolbar-wrapper">
                            <div class="row justify-content-between">

                                <div class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                    <span class="filters-toolbar__product-count">Showing: 22</span>
                                </div>
                                <div class="col-4 col-md-4 col-lg-4 text-right">
                                    <div class="filters-toolbar__item">
                                        <label for="SortBy" class="hidden">Sort</label>
                                        <select name="SortBy" id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort">
                                            <option value="title-ascending" selected="selected">Sort</option>
                                            <option>Best Selling</option>
                                            <option>Alphabetically, A-Z</option>
                                            <option>Alphabetically, Z-A</option>
                                            <option>Price, low to high</option>
                                            <option>Price, high to low</option>
                                            <option>Date, new to old</option>
                                            <option>Date, old to new</option>
                                        </select>
                                        <input class="collection-header__default-sort" type="hidden" value="manual">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--End Toolbar-->
                    <div class="grid-products grid--view-items">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="#">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="{{asset('/uploads/product/'.$product->m_image)}}" src="{{asset('/uploads/product/'.$product->m_image)}}" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        @if($product->h_image == null)
                                        <img class="hover blur-up lazyload" data-src="{{asset('assets/images/product-images/product-image1-1.jpg')}}" src="{{asset('assets/images/product-images/product-image1-1.jpg')}}" alt="image" title="product">
                                        @else
                                        <img class="hover blur-up lazyload" data-src="{{asset('/uploads/product/'.$product->h_image)}}" src="{{asset('/uploads/product/'.$product->h_image)}}" alt="image" title="product">
                                        @endif
                                        <!-- End hover image -->

                                        <!-- Hover image -->
{{--                                        <img class="hover blur-up lazyload" data-src="{{asset('assets/images/product-images/product-image1-1.jpg')}}" src="{{asset('assets/images/product-images/product-image1-1.jpg')}}" alt="image" title="product">--}}
                                        <!-- End hover image -->

                                    </a>
                                    <!-- end product image -->

                                    <!-- Start product button -->
                                    <form class="variants add" action="#" onclick="window.location.href='cart.html'" method="post">
                                        <button class="btn btn-addto-cart" type="button">Add To Cart</button>
                                    </form>
                                    <!-- countdown start -->
                                    <!-- <div class="saleTime desktop" data-countdown="2022/03/01"></div> -->
                                    <!-- countdown end -->

                                </div>

                                <!-- end product image -->

                                <!--start product details -->
                                <a href="/single_product">
                                    <div class="product-details text-center">
                                        <!-- product name -->
                                        <div class="product-name">
                                            <p>{{$product->product_name}}</p>
                                        </div>
                                        <!-- End product name -->
                                        <!-- product price -->
                                        <div class="product-price">
                                            <!-- <span class="old-price">Tk.500.00</span> -->
                                            <span class="price">Tk.{{$product->price}}</span>
                                        </div>
                                        <!-- End product price -->

                                        <!-- <div class="product-review">
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star-o"></i>
                                                <i class="font-13 fa fa-star-o"></i>
                                            </div>  -->
                                    </div>
                                </a>
                                <!-- End product details -->
                                <!-- countdown start -->

                                <!-- countdown end -->
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="infinitpaginOuter">
                    <div class="infinitpagin">
                        <a href="#" class="btn loadMore">Load More</a>
                    </div>
                </div>
            </div>
            <!--End Main Content-->
        </div>
    </div>

</div>
<!--End Body Content-->

@include('include.footer')

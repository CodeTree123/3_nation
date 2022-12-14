@include('include.header')


<!--Body Content-->
<div id="page-content">
    <!--MainContent-->
    <div id="MainContent" class="main-content" role="main">


        <div id="ProductSection-product-template"
            class="product-template__container prstyle1 container product-right-sidebar">
            <!--product-single-->
            <div class="product-single">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="product-details-img">
                            <div class="zoompro-wrap product-zoom-right pl-20">
                                <div class="zoompro-span">
                                    <!-- 'uploads/product/'.$product->m_image -->
                                    <img class="zoompro blur-up lazyload"
                                        data-zoom-image="{{asset('uploads/product/'.$product->m_image)}}" alt=""
                                        src="{{asset('uploads/product/'.$product->m_image)}}" />
                                </div>

                            </div>
                            <div class="lightboximages">
                                <a href="{{asset('uploads/product/'.$product->m_image)}}" data-size="1462x2048"></a>
                                <a href="{{asset('uploads/product/'.$product->h_image)}}" data-size="1462x2048"></a>
                                @php
                                $others_imgs = $product->other_images;
                                $others_imgs = explode(",",$others_imgs);
                                @endphp

                                @foreach($others_imgs as $other_img)
                                <a href="{{asset('uploads/product/'.$other_img)}}" data-size="1462x2048"></a>
                                @endforeach
                                {{--<a href="{{asset('assets/images/product-detail-page/product-with-right-thumbs-4.jpg')}}"
                                data-size="1462x2048"></a>
                                <a href="{{asset('assets/images/product-detail-page/product-with-right-thumbs-5.jpg')}}"
                                    data-size="1462x2048"></a>
                                <a href="{{asset('assets/images/product-detail-page/product-with-right-thumbs-6.jpg')}}"
                                    data-size="1462x2048"></a>--}}
                            </div>
                            <div class="product-thumb">
                                <div id="gallery" class="product-dec-slider-2 product-tab-left">
                                    <a data-image="{{asset('uploads/product/'.$product->m_image)}}"
                                        data-zoom-image="{{asset('uploads/product/'.$product->m_image)}}"
                                        class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true"
                                        tabindex="-1">
                                        <img class="blur-up lazyload"
                                            src="{{asset('uploads/product/'.$product->m_image)}}" alt="" />
                                    </a>
                                    <a data-image="{{asset('uploads/product/'.$product->h_image)}}"
                                        data-zoom-image="{{asset('uploads/product/'.$product->h_image)}}"
                                        class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true"
                                        tabindex="-1">
                                        <img class="blur-up lazyload"
                                            src="{{asset('uploads/product/'.$product->h_image)}}" alt="" />
                                    </a>
                                    @php
                                    $other_imgs = $product->other_images;
                                    $other_imgs = explode(",",$other_imgs);
                                    @endphp
                                    @foreach($other_imgs as $key=>$other_img)
                                    <a data-image="{{asset('uploads/product/'.$other_img)}}"
                                        data-zoom-image="{{asset('uploads/product/'.$other_img)}}"
                                        class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true"
                                        tabindex="-1">
                                        <img class="blur-up lazyload" src="{{asset('uploads/product/'.$other_img)}}"
                                            alt="" />
                                    </a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="product-information">
                            <div class="product-single__meta">
                                <h1 class="product-single__title">{{$product->product_name}}</h1>

                                <div class="prInfoRow">
                                    <div class="product-stock">
                                        @if($product->quantity != 0)
                                        <span class="instock ">In Stock</span>
                                        @else
                                        <span class="outstock">Unavailable</span>
                                        @endif
                                    </div>
                                    <div class="product-sku">SKU: <span
                                            class="variant-sku">{{$product->product_code}}</span>
                                    </div>

                                </div>
                                <p class="product-single__price product-single__price-product-template">
                                    <span class="visually-hidden">Regular price</span>
                                    <span class="product-price__price product-price__price-product-template">
                                        <span id="ProductPrice-product-template"><span
                                                class="money">Tk.{{$product->price}}</span></span>
                                    </span>
                                </p>
                                <div class="product-single__description rte">
                                    <p> {{$product->description}}</p>
                                </div>
                                <form method="post" action="http://annimexweb.com/cart/add"
                                    id="product_form_10508262282" accept-charset="UTF-8"
                                    class="product-form product-form-product-template hidedropdown"
                                    enctype="multipart/form-data">
                                    <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                        <div class="product-form__item">
                                            <label class="header">Color: </label>
                                            @php
                                            $pro_colors = $product->color;
                                            $pro_colors = explode(",",$pro_colors);
                                            @endphp
                                            @foreach($pro_colors as $color)
                                            <div data-value="{{$color}}"
                                                class="swatch-element color {{$color}} available">
                                                <input class="swatchInput" id="swatch-0-{{$color}}" type="radio"
                                                    name="size" value="{{$color}}">
                                                <label class="swatchLbl color small" for="swatch-0-{{$color}}"
                                                    title="Black">{{$color}}</label>
                                            </div>
                                            @endforeach
                                            <!-- <div data-value="Maroon" class="swatch-element color maroon available">
                            <input class="swatchInput" id="swatch-0-maroon" type="radio" name="option-0" value="Maroon"><label class="swatchLbl color small" for="swatch-0-maroon" style="background-color:maroon;" title="Maroon"></label>
                          </div>
                          <div data-value="Blue" class="swatch-element color blue available">
                            <input class="swatchInput" id="swatch-0-blue" type="radio" name="option-0" value="Blue"><label class="swatchLbl color small" for="swatch-0-blue" style="background-color:blue;" title="Blue"></label>
                          </div>
                          <div data-value="Dark Green" class="swatch-element color dark-green available">
                            <input class="swatchInput" id="swatch-0-dark-green" type="radio" name="option-0" value="Dark Green"><label class="swatchLbl color small" for="swatch-0-dark-green" style="background-color:darkgreen;" title="Dark Green"></label>
                          </div> -->
                                        </div>
                                    </div>
                                    <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                        <div class="product-form__item">
                                            <label class="header">Size:</label>
                                            @php
                                            $sizes = $product->size;
                                            $sizes = explode(",",$sizes);
                                            @endphp
                                            @foreach($sizes as $size)
                                            <div data-value="{{$size}}" class="swatch-element {{$size}} available">
                                                <input class="swatchInput" id="swatch-1-{{$size}}" type="radio"
                                                    name="option-1" value="{{$size}}">
                                                <label class="swatchLbl medium" for="swatch-1-{{$size}}"
                                                    title="XS">{{$size}}</label>
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                    <p class="infolinks"><a href="#sizechart" class="sizelink btn"> Size Guide</a>
                                    </p>
                                    <!-- Product Action -->
                                    <div class="product-action clearfix">
                                        <div class="product-form__item--quantity">
                                            <div class="wrapQtyBtn">
                                                <div class="qtyField">
                                                    <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                            class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                    <input type="text" id="Quantity" name="quantity" value="1"
                                                        class="product-form__input qty">
                                                    <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                            class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-form__item--submit">
                                            <a href="{{route('addtocart',[$product->id])}}" type="button" name="add"
                                                class="btn product-form__cart-submit">
                                                <span id="AddToCartText-product-template">Order Now!</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Product Action -->
                                </form>


                            </div>
                        </div>
                        <!--Product Tabs-->
                        <div class="tabs-listing">
                            <ul class="nav nav-tabs product-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active tablink" id="home-tab" data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">PRODUCT DETAILS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tablink" id="profile-tab" data-toggle="tab" href="#profile"
                                        role="tab" aria-controls="profile" aria-selected="false">SIZE CHART</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tablink" id="contact-tab" data-toggle="tab" href="#contact"
                                        role="tab" aria-controls="contact" aria-selected="false">SHIPPING & RETURNS</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="container mt-3">
                                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                          Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                          unknown printer took a galley of type and scrambled it to make a type specimen
                                          book. It has survived not only five centuries, but also the leap into electronic
                                          typesetting, remaining essentially unchanged.</p>
                                      <ul>
                                          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                          <li>Sed ut perspiciatis unde omnis iste natus error sit</li>
                                          <li>Neque porro quisquam est qui dolorem ipsum quia dolor</li>
                                          <li>Lorem Ipsum is not simply random text.</li>
                                          <li>Free theme updates</li>
                                      </ul>
                                      <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</h3>
                                      <p>You can change the position of any sections such as slider, banner, products,
                                          collection and so on by just dragging and dropping.&nbsp;</p>
                                      <h3>Lorem Ipsum is not simply random text.</h3>
                                      <p>But I must explain to you how all this mistaken idea of denouncing pleasure and
                                          praising pain was born and I will give you a complete account of the system, and
                                          expound the actual teachings of the great explorer of the truth, the
                                          master-builder of human happiness.</p>
                                      </div>
                                  </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                  <div class="container mt-3">
                                  <h3>WOMEN'S BODY SIZING CHART</h3>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Size</th>
                                                <th>XS</th>
                                                <th>S</th>
                                                <th>M</th>
                                                <th>L</th>
                                                <th>XL</th>
                                            </tr>
                                            <tr>
                                                <td>Chest</td>
                                                <td>31" - 33"</td>
                                                <td>33" - 35"</td>
                                                <td>35" - 37"</td>
                                                <td>37" - 39"</td>
                                                <td>39" - 42"</td>
                                            </tr>
                                            <tr>
                                                <td>Waist</td>
                                                <td>24" - 26"</td>
                                                <td>26" - 28"</td>
                                                <td>28" - 30"</td>
                                                <td>30" - 32"</td>
                                                <td>32" - 35"</td>
                                            </tr>
                                            <tr>
                                                <td>Hip</td>
                                                <td>34" - 36"</td>
                                                <td>36" - 38"</td>
                                                <td>38" - 40"</td>
                                                <td>40" - 42"</td>
                                                <td>42" - 44"</td>
                                            </tr>
                                            <tr>
                                                <td>Regular inseam</td>
                                                <td>30"</td>
                                                <td>30??"</td>
                                                <td>31"</td>
                                                <td>31??"</td>
                                                <td>32"</td>
                                            </tr>
                                            <tr>
                                                <td>Long (Tall) Inseam</td>
                                                <td>31??"</td>
                                                <td>32"</td>
                                                <td>32??"</td>
                                                <td>33"</td>
                                                <td>33??"</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h3>MEN'S BODY SIZING CHART</h3>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Size</th>
                                                <th>XS</th>
                                                <th>S</th>
                                                <th>M</th>
                                                <th>L</th>
                                                <th>XL</th>
                                                <th>XXL</th>
                                            </tr>
                                            <tr>
                                                <td>Chest</td>
                                                <td>33" - 36"</td>
                                                <td>36" - 39"</td>
                                                <td>39" - 41"</td>
                                                <td>41" - 43"</td>
                                                <td>43" - 46"</td>
                                                <td>46" - 49"</td>
                                            </tr>
                                            <tr>
                                                <td>Waist</td>
                                                <td>27" - 30"</td>
                                                <td>30" - 33"</td>
                                                <td>33" - 35"</td>
                                                <td>36" - 38"</td>
                                                <td>38" - 42"</td>
                                                <td>42" - 45"</td>
                                            </tr>
                                            <tr>
                                                <td>Hip</td>
                                                <td>33" - 36"</td>
                                                <td>36" - 39"</td>
                                                <td>39" - 41"</td>
                                                <td>41" - 43"</td>
                                                <td>43" - 46"</td>
                                                <td>46" - 49"</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <img src="assets/images/size.jpg" alt="" />
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="container mt-3">
                                      <h4>Returns Policy</h4>
                                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros justo,
                                          accumsan non dui sit amet. Phasellus semper volutpat mi sed imperdiet. Ut odio
                                          lectus, vulputate non ex non, mattis sollicitudin purus. Mauris consequat justo
                                          a enim interdum, in consequat dolor accumsan. Nulla iaculis diam purus, ut
                                          vehicula leo efficitur at.</p>
                                      <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. In blandit nunc
                                          enim, sit amet pharetra erat aliquet ac.</p>
                                      <h4>Shipping</h4>
                                      <p>Pellentesque ultrices ut sem sit amet lacinia. Sed nisi dui, ultrices ut turpis
                                          pulvinar. Sed fringilla ex eget lorem consectetur, consectetur blandit lacus
                                          varius. Duis vel scelerisque elit, et vestibulum metus. Integer sit amet
                                          tincidunt tortor. Ut lacinia ullamcorper massa, a fermentum arcu vehicula ut. Ut
                                          efficitur faucibus dui Nullam tristique dolor eget turpis consequat varius.
                                          Quisque a interdum augue. Nam ut nibh mauris.</p>
                                      </div>
                                  </div>
                            </div>
                        </div>
                        <!--Product Tabs-->
                    </div>

                </div>
            </div>
            <!--End-product-single-->


        </div>
        <!--#ProductSection-product-template-->
    </div>
    <!--MainContent-->
</div>
<!--End Body Content-->

@include('include.footer')
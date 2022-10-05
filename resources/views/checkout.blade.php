@include('include.header')


    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Checkout</h1></div>
      		</div>
		</div>
        <!--End Page Title-->

        <div class="container">
        	<!-- <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <div class="customer-box returning-customer">
                        <h3><i class="icon anm anm-user-al"></i> Returning customer? <a href="#customer-login" id="customer" class="text-white text-decoration-underline" data-toggle="collapse">Click here to login</a></h3>
                        <div id="customer-login" class="collapse customer-content">
                            <div class="customer-info">
                                <p class="coupon-text">If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <form>
                                    <div class="row">
                                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">Email address <span class="required-f">*</span></label>
                                            <input type="email" class="no-margin" id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputPassword1">Password <span class="required-f">*</span></label>
                                            <input type="password" id="exampleInputPassword1">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check width-100 margin-20px-bottom">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value=""> Remember me!
                                                </label>
                                                <a href="#" class="float-right">Forgot your password?</a>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <div class="customer-box customer-coupon">
                        <h3 class="font-15 xs-font-13"><i class="icon anm anm-gift-l"></i> Have a coupon? <a href="#have-coupon" class="text-white text-decoration-underline" data-toggle="collapse">Click here to enter your code</a></h3>
                        <div id="have-coupon" class="collapse coupon-checkout-content">
                            <div class="discount-coupon">
                                <div id="coupon" class="coupon-dec tab-pane active">
                                    <p class="margin-10px-bottom">Enter your coupon code if you have one.</p>
                                    <label class="required get" for="coupon-code"><span class="required-f">*</span> Coupon</label>
                                    <input id="coupon-code" required="" type="text" class="mb-3">
                                    <button class="coupon-btn btn" type="submit">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <form action="{{route('checkout')}}" method="post">
                @csrf
                <div class="row billing-fields">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                        <div class="create-ac-content bg-light-gray padding-20px-all">
                            <fieldset>
                                <h2 class="login-title mb-3">Billing details</h2>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-firstname">First Name <span class="required-f">*</span></label>
                                        <input name="firstname" value="{{$user->first_name}}" id="input-firstname" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-lastname">Last Name <span class="required-f">*</span></label>
                                        <input name="lastname" value="{{$user->last_name}}" id="input-lastname" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-email">E-Mail <span class="required-f">*</span></label>
                                        <input name="email" value="{{$user->email}}" id="input-email" type="email">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-telephone">Telephone <span class="required-f">*</span></label>
                                        <input name="telephone" value="{{$user->phone}}" id="input-telephone" type="tel">
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                        <label for="input-address-1">Address <span class="required-f">*</span></label>
                                        <input name="address_1" value="" id="input-address-1" type="text">
                                    </div>
                                </div>



                            </fieldset>



                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                        <label for="input-company">Order Notes <span class="required-f">*</span></label>
                                        <textarea class="form-control resize-both" rows="3" name="order_note"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="your-order-payment">
                            <div class="your-order">
                                <h2 class="order-title mb-4">Your Order</h2>

                                <div class="table-responsive-sm order-table">
                                    <table class="bg-white table table-bordered table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Product Name</th>
                                                <th>Price</th>
                                                <th>Size</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $carts = cart();
                                        @endphp
                                        @foreach($carts as $cart)
                                            <tr>
                                                <td class="text-left">{{ $cart->name }}</td>
                                                <td>Tk.{{ $cart->price }}</td>
                                                <td>S</td>
                                                <td>{{ $cart->qty }}</td>
                                                <td>Tk.{{ $cart->subtotal }}</td>
                                            </tr>
                                        @endforeach
    {{--                                        <tr>--}}
    {{--                                            <td class="text-left">Kids Sweater</td>--}}
    {{--                                            <td>Tk.200</td>--}}
    {{--                                            <td>M</td>--}}
    {{--                                            <td>2</td>--}}
    {{--                                            <td>Tk.200</td>--}}
    {{--                                        </tr>--}}
    {{--                                        <tr>--}}
    {{--                                            <td class="text-left">Kid Girl Dress</td>--}}
    {{--                                            <td>Tk.300</td>--}}
    {{--                                            <td>XL</td>--}}
    {{--                                            <td>3</td>--}}
    {{--                                            <td>Tk.300</td>--}}
    {{--                                        </tr>--}}
                                        </tbody>
                                        <tfoot class="font-weight-600">
                                            <tr>
                                                <td colspan="4" class="text-right">Sub Total </td>
                                                <td>Tk.{{ Cart::subtotal() }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">Sub Total </td>
                                                <td>Tk.{{ Cart::tax() }}</td>
                                            </tr>
    {{--                                        <tr>--}}
    {{--                                            <td colspan="4" class="text-right">Shipping </td>--}}
    {{--                                            <td>Tk.50.00</td>--}}
    {{--                                        </tr>--}}
                                            <tr>
                                                <td colspan="4" class="text-right">Total</td>
                                                <td>Tk.{{ Cart::total() }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <hr />

                            <div class="order-button-payment">
                                <button class="btn" value="Place order" type="submit">Place order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!--End Body Content-->

    @include('include.footer')

@include('include.header')
    <div id="page-content">
        <!--MainContent-->
        <div id="MainContent" class="main-content" role="main">
            <div class="container">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                <div class="tabs-listing">
                    <ul class="nav product-tabs mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="tablink {{request()->is('profile') ? 'active' : ''}}" href="{{url('/profile')}}" role="tab" aria-controls="pills-home" aria-selected="true">Profile Information </a>
                        </li>
                        <li class="nav-item">
                            <a class="tablink {{request()->is('change_password') ? 'active' : ''}}" href="{{url('/change_password')}}" role="tab" aria-controls="pills-profile" aria-selected="false">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="tablink {{request()->is('order') ? 'active' : ''}}" href="{{url('/order')}}" role="tab" aria-controls="pills-contact" aria-selected="false">View My Order</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane {{request()->is('profile') ? 'active' : ''}}" id="{{url('/profile')}}" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div  class=" ">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <td>{{$user->first_name." ".$user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Email</th>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Phone</th>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane {{request()->is('change_password') ? 'active' : ''}}" id="{{url('/change_password')}}" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form method="post" action="{{route('change_password')}}" id="new-review-form" class="new-review-form">
                        @csrf
                            <input type="hidden" class="form-control" name="user_id" value="{{$user->id}}">
                            <div class="my-3 ">
                                <label class="spr-form-label" for="old_password">Old Password</label>
                                <input class="spr-form-input spr-form-input-text " id="old_password" type="password" name="old_pass" value="" placeholder="Enter Your Old Password">
                                <span class="text-danger mt-3">@error('old_pass') {{$message}} @enderror</span>
                            </div>
                            <div class="my-3 ">
                                <label class="spr-form-label" for="new_password">New Password</label>
                                <input class="spr-form-input spr-form-input-text " id="new_password" type="password" name="new_pass" value="" placeholder="Enter Your New Password">
                                <span class="text-danger mt-3">@error('new_pass') {{$message}} @enderror</span>
                            </div>
                            <div class="my-3 ">
                                <label class="spr-form-label" for="confirm_new_password">Confirm New Password</label>
                                <input class="spr-form-input spr-form-input-text " id="confirm_new_password" type="password" name="cnew_pass" value="" placeholder="Enter Your Confirm New Password">
                                <span class="text-danger mt-3">@error('cnew_pass') {{$message}} @enderror</span>
                            </div>

                            <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Confrim">
                        </form>
                    </div>
                    <div class="tab-pane {{request()->is('order') ? 'active' : ''}}" id="{{url('/order')}}" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="wishlist-table table-content table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="product-price text-center alt-font">Order No.</th>
                                                <th class="product-price text-center alt-font">Images</th>
                                                <th class="product-name alt-font">Product</th>
                                                <th class="product-price text-center alt-font">Unit Price</th>
                                                <th class="stock-status text-center alt-font">Order Status</th>
                                                <th class="stock-status text-center alt-font">Ordered Quantity</th>
                                                <th class="product-subtotal text-center alt-font">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td class="product-price text-center"><span class="amount">{{$order->order_id}}</span></td>
                                                <td class="product-thumbnail text-center">
                                                    <a href="#"><img src="{{asset('uploads/product/'.$order->image)}}" alt="" title="" /></a>
                                                </td>
                                                <td class="product-name"><h4 class="no-margin"><a href="#">{{$order->product_name}}</a><span></span></h4>
                                                    <p><span class="fw-bold">Product Code: </span> 023154556</p>
                                                </td>
                                                <td class="product-price text-center"><span class="amount">{{$order->sub_total}}Tk</span></td>
                                                <td class="stock text-center">
                                                    @if($order->order_status == 0)
                                                    <span class="">Peinding</span>
                                                    @else
                                                    <span class="">Delivered</span>
                                                    @endif
                                                </td>
                                                <td class="product-price text-center"><span class="amount">{{$order->order_quantity}}</span></td>
                                                <td class="product-subtotal text-center"><button type="button" class="btn btn-small">Action</button></td>
                                            </tr>
                                            @endforeach

{{--                                            <tr>--}}
{{--                                                <td class="product-thumbnail text-center">--}}
{{--                                                    <a href="#"><img src="assets/images/product-images/product-image4.jpg" alt="" title="" /></a>--}}
{{--                                                </td>--}}
{{--                                                <td class="product-name"><h4 class="no-margin"><a href="#">Sueded Cotton Pant in Khaki</a></h4>--}}
{{--                                                    <p><span class="fw-bold">Product Code: </span> 023154556</p>--}}
{{--                                                </td>--}}
{{--                                                <td class="product-price text-center"><span class="amount">150.00Tk.</span></td>--}}
{{--                                                <td class="stock text-center">--}}
{{--                                                    <span class=" ">Pending</span>--}}
{{--                                                </td>--}}
{{--                                                <td class="product-price text-center"><span class="amount">1</span></td>--}}
{{--                                                <td class="product-subtotal text-center"><button type="button" class="btn btn-small">Action</button></td>--}}
{{--                                            </tr>--}}

                                        </tbody>
                                    </table>
                            </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

        @include('include.footer')

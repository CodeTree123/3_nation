@include('include.header')


    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Create an Account</h1></div>
      		</div>
		</div>
        <!--End Page Title-->

        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                       <form method="post" action="{{route('register')}}" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
                        @csrf
                          <div class="row">
	                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                  <input type="hidden" class="form-control" name="role_id" value="2">
                                <div class="form-group">
                                    <label for="FirstName">First Name</label>
                                    <input type="text" name="first_name" placeholder="" id="FirstName" autofocus="" value="{{old('first_name')}}">
                                    <span class="text-danger mt-3">@error('first_name') {{$message}} @enderror</span>
                                </div>
                               </div>
                               <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="LastName">Last Name</label>
                                    <input type="text" name="last_name" placeholder="" id="LastName" value="{{old('last_name')}}">
                                    <span class="text-danger mt-3">@error('last_name') {{$message}} @enderror</span>
                                </div>
                               </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerEmail">Email</label>
                                    <input type="email" name="email" placeholder="" id="CustomerEmail" class="" autocorrect="off" autocapitalize="off" autofocus="" value="{{old('email')}}">
                                    <span class="text-danger mt-3">@error('email') {{$message}} @enderror</span>
                                </div>
                            </div>
                              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPhone">Phone</label>
                                    <input type="tel" name="phone" placeholder="" id="CustomerPhone" class="" autocorrect="off" autocapitalize="off" autofocus="" value="{{old('phone')}}">
                                    <span class="text-danger mt-3">@error('phone') {{$message}} @enderror</span>
                                </div>
                              </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Password</label>
                                    <input type="password" value="" name="password" placeholder="" id="CustomerPassword" class="">
                                    <span class="text-danger mt-3">@error('password') {{$message}} @enderror</span>
                                </div>
                            </div>
                              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="ConfirmPassword">Confirm Password</label>
                                    <input type="password" value="" name="cpassword" placeholder="" id="ConfirmPassword" class="">
                                    <span class="text-danger mt-3">@error('cpassword') {{$message}} @enderror</span>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="Create">
                            </div>
                         </div>
                     </form>
                    </div>
               	</div>
            </div>
        </div>

    </div>
    <!--End Body Content-->

    @include('include.footer')

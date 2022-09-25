@include('include.header') 
        <div id="page-content">
            <!--MainContent-->
            <div id="MainContent" class="main-content" role="main">  
                <div class="container">
                    <div class="tabs-listing"> 
                        <ul class="nav product-tabs mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="tablink active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Profile Information </a>
                            </li>
                            <li class="nav-item">
                                <a class="tablink" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Change Password</a>
                            </li>
                            <li class="nav-item">
                                <a class="tablink" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">View My Order</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div  class=" "> 
                                <table class="table"> 
                                    <tbody>
                                        <tr> 
                                            <th scope="col">Name</th>
                                            <td>Joynal</td> 
                                        </tr>
                                        <tr> 
                                            <th scope="col">Email</th>
                                            <td>joynal@gmail.com</td> 
                                        </tr>
                                        <tr> 
                                            <th scope="col">Phone</th>
                                            <td>011012345678</td> 
                                        </tr> 
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form method="post" action="#" id="new-review-form" class="new-review-form">  
                                    <div class="my-3 ">
                                        <label class="spr-form-label" for="old_password">Old Password</label>
                                        <input class="spr-form-input spr-form-input-text " id="old_password" type="text" name="" value="" placeholder="Enter Your Old Password">
                                    </div> 
                                    <div class="my-3 ">
                                        <label class="spr-form-label" for="new_password">New Password</label>
                                        <input class="spr-form-input spr-form-input-text " id="new_password" type="text" name="" value="" placeholder="Enter Your New Password">
                                    </div> 
                                    <div class="my-3 ">
                                        <label class="spr-form-label" for="confirm_new_password">Confirm New Password</label>
                                        <input class="spr-form-input spr-form-input-text " id="confirm_new_password" type="text" name="" value="" placeholder="Enter Your Confirm New Password">
                                    </div> 
                                
                                    <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Confrim"> 
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="wishlist-table table-content table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr> 
                                                    <th class="product-price text-center alt-font">Images</th>
                                                    <th class="product-name alt-font">Product</th>
                                                    <th class="product-price text-center alt-font">Unit Price</th>
                                                    <th class="stock-status text-center alt-font">Order Status</th>
                                                    <th class="stock-status text-center alt-font">Ordered Quantity</th>
                                                    <th class="product-subtotal text-center alt-font">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr> 
                                                    <td class="product-thumbnail text-center">
                                                        <a href="#"><img src="assets/images/product-images/product-image8.jpg" alt="" title="" /></a>
                                                    </td>
                                                    <td class="product-name"><h4 class="no-margin"><a href="#">Minerva Dress black</a><span></span></h4>
                                                        <p><span class="fw-bold">Product Code: </span> 023154556</p>
                                                    </td>
                                                    <td class="product-price text-center"><span class="amount">165.00Tk,</span></td>
                                                    <td class="stock text-center">
                                                        <span class="">Delivered</span>
                                                    </td>
                                                    <td class="product-price text-center"><span class="amount">1</span></td>
                                                    <td class="product-subtotal text-center"><button type="button" class="btn btn-small">Action</button></td>
                                                </tr>
                                                <tr> 
                                                    <td class="product-thumbnail text-center">
                                                        <a href="#"><img src="assets/images/product-images/product-image4.jpg" alt="" title="" /></a>
                                                    </td>
                                                    <td class="product-name"><h4 class="no-margin"><a href="#">Sueded Cotton Pant in Khaki</a></h4>
                                                        <p><span class="fw-bold">Product Code: </span> 023154556</p> 
                                                    </td>
                                                    <td class="product-price text-center"><span class="amount">150.00Tk.</span></td>
                                                    <td class="stock text-center">
                                                        <span class=" ">Pending</span>
                                                    </td>
                                                    <td class="product-price text-center"><span class="amount">1</span></td>
                                                    <td class="product-subtotal text-center"><button type="button" class="btn btn-small">Action</button></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                </div>
                        </div>
                    </div>
                    
                        
                </div> 
            </div>
        </div>  
    
        @include('include.footer')

@extends('admin.admin_master')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Product</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddProduct">
        Add Product
        </button>
    </div>

   @include('admin.include.errors')

    <div class="table-responsive table-responsive-xl table-responsive-lg table-responsive-md table-responsive-sm">
        <table class="table text-center align-middle">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Code</th>
                <th scope="col">Product Name</th>
                <th scope="col">Sub Catagory Name</th>
                <th scope="col">Catagory Name</th>
                <th scope="col">Branch Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Stock Limit</th>
                <th scope="col">New Stock</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key=>$product)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$product->product_code}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->subcatagory_name}}</td>
                    <td>{{$product->catagory_name}}</td>
                    <td>{{$product->branch_name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->stock_limit}}</td>
                    <td>
                        @if($product->new_stock != null)
                        {{$product->new_stock}}
                        @else
                        0
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary v_image" value="{{$product->id}}">
                        View
                        </button>
                        {{-- @if($product->m_image == null)
                        <img src="{{ asset('img/service.jpg')}}" class="shop_image_view" >
                        @else
                        <img src="{{asset('/uploads/product/'.$product->m_image)}}" class="shop_image_view" >
                        @endif --}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info v_description" value="{{$product->id}}">
                        View
                        </button>
                       {{-- {{$product->description}} --}}
                    </td>
                    <td>
                        @if($product->prostatus == "1")
                        <a class="btn btn-sm btn-success" href="{{route('product_status',[$product->id])}}" role="button">Active</a>
                        @else
                        <a class="btn btn-sm btn-danger" href="{{route('product_status',[$product->id])}}" role="button">Inactive</a>
                        @endif
                    </td>
                    <td style="min-width:270px">
                        <button class="btn update_product" value="{{$product->id}}">Update</button>
                        <button class="btn delete_product" value="{{$product->id}}">delete</button>
                        <button class="btn stock_product" value="{{$product->id}}">Add Stock</button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

<!-- Modal for add Product -->
<div class="modal fade" id="AddProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('product_add')}}" method="post" enctype="multipart/form-data">
             @csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="p_status" value="1">
                    <div class="mb-3">
                      <label for="catagory" class="form-label">Select Sub Catagory Name</label>
                      <select class="form-select" aria-label="Default select example" name="subcat_id" id="catagory">
                        @foreach($subcatagories as $subcatagory)
                        <option value="{{$subcatagory->id}}">{{$subcatagory->subcatagory_name."-".$subcatagory->catagory_name."-".$subcatagory->branch_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                        <label for="product" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product" name="product_name" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="product_code" class="form-label">Product Code</label>
                        <input type="text" class="form-control" id="product_code" name="product_code" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity">
                    </div>
                    <div class="mb-3">
                        <label for="alert_quantity" class="form-label">Alert Quantity</label>
                        <input type="text" class="form-control" id="alert_quantity" name="alert_quantity">
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="color">
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" class="form-control" id="size" name="size">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Main Image</label>
                        <input class="form-control" type="file" id="formFile" name="product_image">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Hover Image</label>
                        <input class="form-control" type="file" id="formFile" name="product_image1">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Other Images</label>
                        <input class="form-control" type="file" id="formFile" name="images[]" multiple>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for update service -->
<div class="modal fade" id="UpdateProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Product</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('product_update')}}" method="post" enctype="multipart/form-data">
             @csrf
             @method('PUT')
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="product_id" value="" id="product_id">
                    <div class="mb-3">
                      <label for="u_sub_cat_id" class="form-label">Select Sub Catagory Name</label>
                      <select class="form-select" aria-label="Default select example" name="u_sub_cat_id" id="u_sub_cat_id" value="">
                        @foreach($subcatagories as $subcatagory)
                        <option value="{{$subcatagory->id}}">{{$subcatagory->subcatagory_name."-".$subcatagory->catagory_name."-".$subcatagory->branch_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                        <label for="u_product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="u_product_name" name="u_product_name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="u_product_code" class="form-label">Product Code</label>
                        <input type="text" class="form-control" id="u_product_code" name="u_product_code" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="u_description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="u_description" name="u_description">
                    </div>
                    <div class="mb-3">
                        <label for="u_price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="u_price" name="u_price">
                    </div>
                    <div class="mb-3">
                        <label for="u_quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="u_quantity" name="u_quantity">
                    </div>
                    <div class="mb-3">
                        <label for="u_alert_quantity" class="form-label">Alert Quantity</label>
                        <input type="text" class="form-control" id="u_alert_quantity" name="u_alert_quantity">
                    </div>
                    <div class="mb-3">
                        <label for="u_color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="u_color" name="u_color">
                    </div>
                    <div class="mb-3">
                        <label for="u_size" class="form-label">Size</label>
                        <input type="text" class="form-control" id="u_size" name="u_size">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Main Image</label>
                        <input class="form-control" type="file" id="formFile" name="product_image">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Hover Image</label>
                        <input class="form-control" type="file" id="formFile" name="product_image1">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Other Images</label>
                        <input class="form-control" type="file" id="formFile" name="images[]" multiple>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for delete service -->
<div class="modal fade" id="DeleteProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('product_delete')}}" method="post">
             @csrf
             @method('delete')
                <div class="mb-3 text-center">
                    <h5 class="text-danger">Are You Sure to Delete This Service?</h5>
                </div>
                <input type="hidden" class="form-control" id="del_pro_id" name="deletingId">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes,Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Add Stock service -->
<div class="modal fade" id="AddStock" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add New Stock</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('add_product_stock')}}" method="post" enctype="multipart/form-data">
             @csrf
             @method('PUT')
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="pro_id" value="" id="stock_product_id">

                    <div class="mb-3">
                        <label for="stock" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="stock" name="stock">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Stock</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal to View Images of Product -->
<div class="modal fade" id="view_image_modal" tabindex="-1" aria-labelledby="view_image_modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="view_image_modal">Product Images</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <div class="row" id="test">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal to View Description of Product -->
<div class="modal fade" id="view_product_description" tabindex="-1" aria-labelledby="view_product_description" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="view_product_description">Product Description</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="test2">

               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, fuga. Dolor pariatur fuga perferendis dolorem tenetur nisi, optio eveniet vero obcaecati. Sint debitis totam sequi sunt provident saepe minima deleniti doloribus ipsam soluta pariatur quas nisi, aliquid hic error, autem quam molestias sapiente quod impedit maxime repudiandae quae tenetur quisquam. Libero quam doloremque expedita ex aspernatur voluptas. Ea quibusdam rem nostrum excepturi facilis consequatur ullam dignissimos ipsa eum, saepe ipsum accusantium possimus velit quod quas mollitia nobis nihil dolorem veniam aliquam. Illo quia repellendus dignissimos tempora eligendi, libero dolore amet cum fugit odit impedit? Vero sed veritatis dolore fuga similique?

            </div>
        </div>
    </div>
</div>



@endsection


@push('custom-scripts')
<script>
    $(document).ready(function(){

        window.setTimeout(function(){
            $(".test").alert('close');
        },2000);

        $(document).on('click', '.update_product',function(){
            var update_id = $(this).val();
            $("#UpdateProduct").modal('show');
            $.ajax({
                    type:"GET",
                    url: "/admin/product/edit/"+update_id,
                    success: function(response){
                        // console.log(response.serv);
                        $('#product_id').val(update_id);
                        $('#u_sub_cat_id').val(response.pro.subcat_id);
                        $('#u_product_code').val(response.pro.product_code);
                        $('#u_product_name').val(response.pro.product_name);
                        $('#u_description').val(response.pro.description);
                        $('#u_price').val(response.pro.price);
                        $('#u_quantity').val(response.pro.quantity);
                        $('#u_alert_quantity').val(response.pro.stock_limit);
                        $('#u_color').val(response.pro.color);
                        $('#u_size').val(response.pro.size);
                    }
                });
        });

        $(document).on('click', '.delete_product',function(){
            var deleteId = $(this).val();
            $("#DeleteProduct").modal('show');
            $('#del_pro_id').val(deleteId);
        });

        $(document).on('click', '.stock_product',function(){
            var proId = $(this).val();
            $("#AddStock").modal('show');
            $('#stock_product_id').val(proId);
        });

        $(document).on('click', '.v_image',function(){
            var proId = $(this).val();
            $("#view_image_modal").modal('show');
            $.ajax({
                    type:"GET",
                    url: "/admin/product/image/"+proId,
                    success: function(response){
                        // console.log(response.all_image);

                        $("#test").html("");
                        $.each(response.all_image, function (i,item){

                            $("#test").append('\
                                    <div class="col-3">\
                                        <img class="logo mx-auto" src="/uploads/product/'+item+'" alt="" width="100%">\
                                    </div>\
                            ');
                        });
                    }
                });
        });

        $(document).on('click', '.v_description',function(){
            var proId = $(this).val();
            $("#view_product_description").modal('show');
            $.ajax({
                    type:"GET",
                    url: "/admin/product/description/"+proId,
                    success: function(response){
                        // console.log(response.des);

                        $("#test2").html("");

                        $("#test2").append('\
                                <p>'+response.des+'</p>\
                        ');
                    }
                });
        });

    });
</script>
@endpush

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
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Sub Catagory Name</th>
                <th scope="col">Catagory Name</th>
                <th scope="col">Branch Name</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key=>$product)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->subcatagory_name}}</td>
                    <td>{{$product->catagory_name}}</td>
                    <td>{{$product->catagory_name}}</td>
                    <td>
                        @if($product->image == null)
                            <img src="{{ asset('img/service.jpg')}}" class="shop_image_view" >
                        @else
                            <img src="{{asset('/uploads/product/'.$product->image)}}" class="shop_image_view" >
                        @endif
                    </td>
                    <td>{{$product->s_description}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <button class="btn update_product" value="{{$product->id}}">Update</button>
                        <button class="btn delete_product" value="{{$product->id}}">delete</button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

<!-- Modal for add service -->
<div class="modal fade" id="AddProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
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
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Image</label>
                        <input class="form-control" type="file" id="formFile" name="product_image">
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
                        <label for="u_description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="u_description" name="u_description">
                    </div>
                    <div class="mb-3">
                        <label for="u_price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="u_price" name="u_price">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Image</label>
                        <input class="form-control" type="file" id="formFile" name="product_image">
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
                        $('#u_product_name').val(response.pro.product_name);
                        $('#u_description').val(response.pro.description);
                        $('#u_price').val(response.pro.price);
                    }
                });
        });

        $(document).on('click', '.delete_product',function(){
            var deleteId = $(this).val();
            $("#DeleteProduct").modal('show');
            $('#del_pro_id').val(deleteId);
        });

    });
</script>
@endpush

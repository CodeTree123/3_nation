@extends('admin.admin_master')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Branch</h1>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddBranch">
        Add Branch
        </button> -->
    </div>

    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Branch Name</th>
      <!-- <th scope="col">Action</th> -->
    </tr>
  </thead>
  <tbody>
    @foreach($branchs as $key=>$branch)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$branch->branch_name}}</td>
      {{-- <td>
        <button class="btn update_branch" value="{{$branch->id}}">Update</button>
        <button class="btn delete_branch" value="{{$branch->id}}">delete</button>
      </td> --}}
    </tr>
    @endforeach
  </tbody>
</table>


<!-- Modal for add catagory -->
<!-- <div class="modal fade" id="AddBranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Catagory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
             @csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="shop_id" value="{{ Auth::user()->id}}">
                    <input type="hidden" class="form-control" name="c_status" value="1">
                    <div class="mb-3">
                        <label for="catagory" class="form-label">Catagory Name</label>
                        <input type="text" class="form-control" id="catagory" name="catagory_name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="c_description" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Catagory Image</label>
                        <input class="form-control" type="file" id="formFile" name="catagory_image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- Modal for update catagory -->
<!-- <div class="modal fade" id="UpdateCatagory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Catagory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
             @csrf
             @method('PUT')
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="shop_catagory_id" value="" id="shop_catagory_id">
                    <div class="mb-3">
                        <label for="catagory_name" class="form-label">Catagory Name</label>
                        <input type="text" class="form-control" id="catagory_name" name="catagory_name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="cat_description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="cat_description" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Catagory Image</label>
                        <input class="form-control" type="file" id="formFile" name="catagory_image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<!-- Modal for delete catagory -->
<!-- <div class="modal fade" id="DeleteCatagory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Catagory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post">
             @csrf
             @method('delete')
                <div class="mb-3 text-center">
                    <h5 class="text-danger">Are You Sure to Delete This Catagory?</h5>
                </div>
                <input type="hidden" class="form-control" id="del_cat_id" name="deletingId">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes,Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

@endsection


@push('custom-scripts')
<!-- <script>
    $(document).ready(function(){
        $(document).on('click', '.update_cat',function(){
            var update_id = $(this).val();
            $("#UpdateCatagory").modal('show');
            $.ajax({
                    type:"GET",
                    url: "/shop/catagory/edit/"+update_id,
                    success: function(response){
                        // console.log(response.cat);
                        $('#shop_catagory_id').val(update_id);
                        $('#catagory_name').val(response.cat.catagory_name);
                        $('#cat_description').val(response.cat.c_description);
                    }
                });
        });

        $(document).on('click', '.delete_cat',function(){
            var deleteId = $(this).val();
            $("#DeleteCatagory").modal('show');
            $('#del_cat_id').val(deleteId);
        });

    });
</script> -->
@endpush
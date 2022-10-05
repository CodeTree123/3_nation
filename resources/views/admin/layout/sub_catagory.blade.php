@extends('admin.admin_master')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Sub Catagory</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddSubCatagory">
        Add Sub Catagory
        </button>
    </div>

    @include('admin.include.errors')

<table class="table text-center align-middle">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sub Catagory Name</th>
      <th scope="col">Catagory Name</th>
      <th scope="col">Branch Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($subcatagories as $key=>$subcat)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$subcat->subcatagory_name}}</td>
      <td>{{$subcat->catagory_name}}</td>
      <td>{{$subcat->branch_name}}</td>
      <td>
        @if($subcat->subcatstatus == "1")
        <a class="btn btn-sm btn-success" href="{{route('sub_catagory_status',[$subcat->id])}}" role="button">Active</a>
        @else
        <a class="btn btn-sm btn-danger" href="{{route('sub_catagory_status',[$subcat->id])}}" role="button">Inactive</a>
        @endif
      </td>
      <td>
        <button class="btn update_subcat" value="{{$subcat->id}}">Update</button>
        <button class="btn delete_subcat" value="{{$subcat->id}}">delete</button>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

<!-- Modal for add sub catagory -->
<div class="modal fade" id="AddSubCatagory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Sub Catagory</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('sub_catagory_add')}}" method="post" enctype="multipart/form-data">
             @csrf
                <div class="modal-body">
                  <input type="hidden" class="form-control" name="subcat_status" value="1">
                  <div class="mb-3">
                    <label for="catagory" class="form-label">Select Catagory Name</label>
                    <select class="form-select" aria-label="Default select example" name="cat_id" id="catagory">
                      @foreach($catagories as $catagory)
                      <option value="{{$catagory->id}}">{{$catagory->catagory_name."-".$catagory->branch_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- <input type="text" class="form-control" name="sc_status" value="1"> -->
                  <div class="mb-3">
                      <label for="catagory" class="form-label">Sub Catagory Name</label>
                      <input type="text" class="form-control" id="catagory" name="subcatagory_name" aria-describedby="emailHelp">
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

<!-- Modal for update catagory -->
<div class="modal fade" id="UpdateSubCatagory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Sub Catagory</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('sub_catagory_update')}}" method="post" enctype="multipart/form-data">
             @csrf
             @method('PUT')
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="u_subcatagory_id" value="" id="u_subcatagory_id">
                    <div class="mb-3">
                      <label for="ucatagory" class="form-label">Select Catagory Name</label>
                      <select class="form-select" aria-label="Default select example" name="cat_id" id="u_catagory" value="">
                        @foreach($catagories as $catagory)
                        <option value="{{$catagory->id}}">{{$catagory->catagory_name."-".$catagory->branch_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                        <label for="u_subcatagory_name" class="form-label">Sub Catagory Name</label>
                        <input type="text" class="form-control" id="u_subcatagory_name" name="subcatagory_name" aria-describedby="emailHelp">
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

<!-- Modal for delete catagory -->
<div class="modal fade" id="DeleteSubCatagory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Sub Catagory</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('sub_catagory_delete')}}" method="post">
             @csrf
             @method('delete')
                <div class="mb-3 text-center">
                    <h5 class="text-danger">Are You Sure to Delete This Sub Catagory?</h5>
                </div>
                <input type="hidden" class="form-control" id="del_subcat_id" name="deletingId">
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
        // $('#catagory').on('change', function() {
        //     var cat_id = $(this).val();
        //     alert( cat_id);
        // });

        window.setTimeout(function(){
            $(".test").alert('close');
        },2000);

        $(document).on('click', '.update_subcat',function(){
            var update_id = $(this).val();
            $("#UpdateSubCatagory").modal('show');
            $.ajax({
                    type:"GET",
                    url: "/admin/sub_catagory/edit/"+update_id,
                    success: function(response){
                        // console.log(response.subcat);
                        $('#u_subcatagory_id').val(update_id);
                        $('#u_catagory').val(response.subcat.cat_id);
                        $('#u_subcatagory_name').val(response.subcat.subcatagory_name);
                    }
                });
        });

        $(document).on('click', '.delete_subcat',function(){
            var deleteId = $(this).val();
            $("#DeleteSubCatagory").modal('show');
            $('#del_subcat_id').val(deleteId);
        });

    });
</script>
@endpush

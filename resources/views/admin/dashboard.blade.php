@extends('layouts.admin')

@section('content')

<section>
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <a href="" id="addNew" class="font-weight-bold text-primary">
              Tambah data
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" data-url="{{ route("product.index") }}">
                <thead>
                  <tr>
                    <th>Action</th>
                    <th>Name</th>
                    <th>Category</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group">
              <label for="">Cover</label>
              <input type="file" class="form-control-file" name="" id="" placeholder="" aria-describedby="fileHelpId">
            </div>

          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnAction">Save</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>

  $(document).ready(function () {
    
    // show data
    var url = $('table').attr('data-url');
    var table = $('table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: url,
        columns: [
            { data: 'action', name: 'action', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'category_id', name: 'category_id' },
        ],
    });

    // create - show modal
    $('#addNew').click(function (e) { 
      e.preventDefault();
      $('#modelId').modal('show');
    });

    // edit - show modal
    $('table').on('click', '.btnEdit', function (e) {
      e.preventDefault();

      var url = $(this).attr('data-url');
      $.ajax({
        type: "GET",
        url: url,
        success: function (response) {
          console.log(response);
        }
      });
      
      $('#modelId').modal('show');
    });

    // delete
    $('table').on('click', '.btnDestroy', function (e) {
      e.preventDefault();

      var url = $(this).attr('data-url');
      $.ajax({
        type: "GET",
        url: url,
        success: function (response) {
          $.ajax({
            type: "DELETE",
            url: url,
            success: function (response) {
              console.log(response);
              table.draw()
            }
          });
        }
      });
      
    });

  });
  </script>
@endpush
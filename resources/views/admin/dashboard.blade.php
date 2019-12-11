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
                    <th>Image</th>
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
              <input value="{{ \Faker\Factory::create()->randomElement([ 'Grape', 'Orange', 'Bananas', 'Boysenberries', 'Blueberries', 'Bing Cherry'])
              }}" type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group">
              <label for="">Category_id</label>
              <input value="{{ \Faker\Factory::create()->randomNumber(1) }}" type="text" class="form-control" name="category_id" id="category_id" aria-describedby="helpId" placeholder="">
            </div>

            <div class="row">
              <div class="form-group col">
                  <img class="img-fluid rounded" src=""/>
              </div>
              <div class="form-group col">
                <label for="">Cover</label>
                <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">
              </div>
            </div>

          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnSave">Save</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>

  $(document).ready(function () {
    
    // show data
    var url = '/api/v1/product';
    var table = $('table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: url,
        columns: [
            { data: 'action', name: 'action', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'category_id', name: 'category_id' },
            { data: 'image', name: 'image' },
        ],
    });

    // create - show modal
    $('#addNew').click(function (e) { 
      e.preventDefault();
      $('#btnUpdate').attr('id', 'btnSave').text('Save')

      $('#modelId').modal('show');
    });

    // store data
    $('#modelId').on('click', '#btnSave', function (e) {
      e.preventDefault()

      var form = $('form')[0];
      var data = new FormData(form);

      $.ajax({
        type: "POST",
        url: "{{ route('product.store') }}",
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        success: function (response) {
          $('#modelId').modal('hide');
          table.draw();
        }
      });
      
    });

    // edit - show modal
    $('table').on('click', '.btnEdit', function (e) {
      e.preventDefault();

      $('#btnSave').attr('id', 'btnUpdate').text('Update')
      
      $.ajax({
        type: "GET",
        url: url+ '/' + $(this).attr('data-url'),
        success: function (response) {
          $.each(response.data, function (index, value) {

            if(value.constructor.name != 'Object') {
              if(index != 'image') {
                $('#modelId').find('#'+index).val(value)
              } else {
                $('form').find('img').attr('src', 'images/'+value)
                console.log(value); 
              }
            }

          });
        }
      });
      
      $('#modelId').modal('show');
    });

    // delete
    $('table').on('click', '.btnDestroy', function (e) {
      e.preventDefault();

      $.ajax({
        type: "DELETE",
        url: url+ '/' + $(this).attr('data-url'),
        success: function (response) {
          // console.log(response);
          table.draw();
        }
      });
    });

    // store
  });
  </script>
@endpush
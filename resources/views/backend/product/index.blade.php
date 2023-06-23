@extends('backend.adminMaster')
@section('title')
All-products
@endsection

@section('dashboardContent')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="{{ route('product.create') }}" class="btn btn-primary" > + Add New</a>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Product List </h3>
            </div><br>
            <div class="row p-2">
            	<div class="form-group col-3">
            		<label>Category</label>
            		 <select class="form-control submitable" name="category_id" id="category_id">
            		 	<option value="">All</option>
            		 	  @foreach($category as $row)
            		 	    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
            		 	  @endforeach  
            		 </select>
            	</div>
            	<div class="form-group col-3">
            		<label>Status</label>
            		 <select class="form-control submitable" name="status" id="status">
            		 	<option value="1">All</option>
            		 	    <option value="1">Active</option>
							<option value="0">Inactive</option>
            		 </select>
            	</div>
            </div>
            <!-- /.card-header -->
              <div class="card-body">
                <table id="" class="table table-bordered table-striped table-sm ytable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
</div>
</section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	$(function products(){
		table=$('.ytable').DataTable({
			"processing":true,
      "serverSide":true,
      "searching":true,
      "ajax":{
        "url": "{{ route('product.index') }}", 
        "data":function(e) {
          e.category_id =$("#category_id").val();
          e.brand_id =$("#brand_id").val();
          e.status =$("#status").val();
          e.warehouse =$("#warehouse").val();
        }
      },
			columns:[
				{data:'DT_RowIndex',name:'DT_RowIndex'},
				{data:'thumbnail'  ,name:'thumbnail'},
				{data:'name'  ,name:'name'},
				{data:'code'  ,name:'code'},
				{data:'category_name',name:'category_name'},
				{data:'subcategory_name',name:'subcategory_name'},
				{data:'status',name:'status'},
				{data:'action',name:'action',orderable:true, searchable:true},
			]
		});
	});

    //deactive status
	$('body').on('click','.deactive_status', function(){
	    var id=$(this).data('id');
		var url = "{{ url('product/not-status') }}/"+id;
		$.ajax({
			url:url,
			type:'get',
			success:function(data){  
	        toastr.success(data);
	        table.ajax.reload();
	      }
	  });
    });

    //Active status
	$('body').on('click','.active_status', function(){
	    var id=$(this).data('id');
		var url = "{{ url('product/active-status') }}/"+id;
		$.ajax({
			url:url,
			type:'get',
			success:function(data){  
	        toastr.success(data);
	        table.ajax.reload();
	      }
	    });
    });


	//submitable class call for every change
  $(document).on('change','.submitable', function(){
    $('.ytable').DataTable().ajax.reload();
  });
</script>
@endsection
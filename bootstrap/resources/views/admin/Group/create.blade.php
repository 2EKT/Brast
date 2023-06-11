@include("admin.include.header");
@include("admin.include.sidebar");
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Create Group</h4>
    @if(session()->has('success'))
        <div class="alert alert-secondary alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{ session()->get('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-warning alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-alert-line label-icon"></i><strong>Error</strong> - {{ session()->get('error') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>     
    @endif

    @if ($errors->any())
    <div class="alert alert-danger p-1 mt-2">
        <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
        </ul>
    </div>
    @endif
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{ url('/admin/Group') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="row gy-4">
                                   
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Category Name*</label>
                                            <select class="form-control" name="cat_id" id="cat_id" required>
                                                <option value="">Select Category</option>
                                                @php
                                                $row=DB::table('categories')->get();
                                                @endphp
                                                @foreach ($row as $details)
                                                <option value="{{ $details->id }}">{{ $details->category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Subcategory Name*</label>
                                            <select class="form-control" name="subcat_id" id="subcat_id" required>
                                                <option value="">Select Subcategory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Metacategory Name*</label>
                                            <select class="form-control" name="megacategory" id="Megcat_id" required>
                                                <option value="">Select Megacategory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Segment Name*</label>
                                            <select class="form-control" name="Segment" id="Segment" required>
                                                <option value="">Select Segment</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Sub Segment Name*</label>
                                            <select class="form-control" name="SubSegment" id="SubSegment" required>
                                                <option value="">Select Sub Segment</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Group Name*</label>
                                            <input type="text" class="form-control" name="Group" placeholder="Group Name" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Image*</label>
                                            <input type="file" class="form-control" name="image" required>
                                            <span style="color:red;">Max image size 1000kb</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-xxl-3 col-md-6 pt-4">
                                        <div class="form-floating">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->
@include("admin.include.footer");

<script>
    $("#cat_id").on('change',function(){
            var category=$(this).val();
            // alert(category);
            $("#subcat_id").html("<option value=''>Select Subcategory</option>");
                $.ajax({
                    url:"{{ url('admin/Group/get_subcategory') }}",
                    type:'post',
                    data:'category='+category+'&_token={{ csrf_token() }}',
                    success:function(data){
                          $("#subcat_id").append(data);
                    }
                  });
                  
               
                  
        });
        $("#subcat_id").on('change',function(){
            let mega=$(this).val();
            // alert(category);
            $("#Megcat_id").html("<option value=''>Select Megacategory</option>");
                  $.ajax({
                    url:"{{ url('admin/Group/get_megacategory') }}",
                    type:'post',
                    data:'category='+mega+'&_token={{ csrf_token() }}',
                    success:function(data){
                          $("#Megcat_id").append(data);
                    }
                  });
                  
               
                  
        });
        $("#Megcat_id").on('change',function(){
            let Segment=$(this).val();
            // alert(category);
            $("#Segment").html("<option value=''>Select Segment</option>");
                  $.ajax({
                    url:"{{ url('admin/Group/get_Segment') }}",
                    type:'post',
                    data:'category='+Segment+'&_token={{ csrf_token() }}',
                    success:function(data){
                          $("#Segment").append(data);
                    }
                  });
                  
               
                  
        });
        
        $("#Segment").on('change',function(){
            let SubSegment=$(this).val();
            //  alert(SubSegment);
            $("#SubSegment").html("<option value=''>Select Sub Segment</option>");
                  $.ajax({
                    url:"{{ url('admin/Group/get_SubSegment') }}",
                    type:'post',
                    data:'category='+SubSegment+'&_token={{ csrf_token() }}',
                    success:function(data){
                          $("#SubSegment").append(data);
                    }
                  });
                  
               
                  
        });
</script>
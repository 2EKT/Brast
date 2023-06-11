@include("merchant.include.header");
@include("merchant.include.sidebar");
@php
  $merchant_id = Auth::guard('merchant')->user()->id;
@endphp  
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Add Product</h4>
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
                                <form action="{{ url('/merchant/product') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="row gy-4">
                                   
                                    <div class="col-xxl-3 col-md-4">
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
                                    <div class="col-xxl-3 col-md-4">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Subcategory Name*</label>
                                            <select class="form-control" name="subcat_id" id="subcat_id" required>
                                                <option value="">Select Subcategory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-4">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Mega Category Name*</label>
                                            <select class="form-control" name="megacat_id" id="megacat_id" required>
                                                <option value="">Select Megacategory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-4">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Segment Name*</label>
                                            <select class="form-control" name="Segment" id="Segment" required>
                                                <option value="">Select Segment</option>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-xxl-3 col-md-4">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Sub Segment Name*</label>
                                            <select class="form-control" name="SubSegment" id="SubSegment" required>
                                                <option value="">Select Sub Segment</option>
                                            </select>
                                        </div>
                                    </div> 
                                      <div class="col-xxl-3 col-md-4">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Group Name*</label>
                                            <select class="form-control" name="Group" id="Group" required>
                                                <option value="">Select Group</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-xxl-3 col-md-4">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Sub Group Name*</label>
                                            <select class="form-control" name="SubGroup" id="SubGroup" required>
                                                <option value="">Select  Sub Group</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-4">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Shop Name*</label>
                                            <select class="form-control" name="shop_id" id="shop_id" required>
                                                <option value="">Select Shop</option>
                                                @php
                                                $row=DB::table('shops')->where(['merchant_id' =>$merchant_id, 'status' => 'active'])->get();
                                                @endphp
                                                @foreach ($row as $details)
                                                <option value="{{ $details->id }}">{{ $details->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-4">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Title*</label>
                                            <input type="text" class="form-control" name="title" placeholder="Product Title" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-4">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Main Image*</label>
                                            <input type="file" class="form-control" name="image" required>
                                            <span style="color:red;">Max image size 1000kb</span>
                                        </div>
                                    </div>
                                    <!-- <div class="col-xxl-3 col-md-4">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Available Colors (Optional)</label>
                                            <input type="text" class="form-control" name="colors" placeholder="Colors">
                                        </div>
                                    </div> -->
                                    <div class="col-xxl-3 col-md-3">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Market Price*</label>
                                            <input type="number" class="form-control product_price" id="product_market_price" name="product_market_price" placeholder="Enter MRP" required>
                                        </div>    
                                    </div>
                                    <div class="col-xxl-3 col-md-3">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Sale Price*</label>
                                            <input type="number" class="form-control product_price" id="product_sale_price" name="product_sale_price" placeholder="Enter Sale Price" required>
                                        </div>    
                                    </div>
                                    <div class="col-xxl-3 col-md-3">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Discount*</label>
                                            <input type="number" step="any" class="form-control product_price" id="product_discount" name="product_discount" placeholder="Enter Discount" required>
                                        </div>    
                                    </div>
                                    <div class="col-xxl-3 col-md-3">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Discount Type*</label>
                                            <select class="form-control" name="product_discount_type" id="product_discount_type" required>
                                                <option value="flat">Flat</option>
                                                <option value="percentage">Percentage</option>
                                            </select>
                                        </div>    
                                    </div>
                                    <div class="col-xxl-12 col-md-12">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Product Description*</label>
                                            <textarea id="editor" class="form-control" name="description" required> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-xxl-3 col-md-3">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Image 1 (Optional)</label>
                                            <input type="file" class="form-control" name="img1" >
                                            <span style="color:red;">Max image size 1000kb</span>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-3">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Image 2 (Optional)</label>
                                            <input type="file" class="form-control" name="img2" >
                                            <span style="color:red;">Max image size 1000kb</span>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-3">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Image 3 (Optional)</label>
                                            <input type="file" class="form-control" name="img3" >
                                            <span style="color:red;">Max image size 1000kb</span>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-3">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Image 4 (Optional)</label>
                                            <input type="file" class="form-control" name="img4" >
                                            <span style="color:red;">Max image size 1000kb</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-xxl-3 col-md-4">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Attribute Type*</label>
                                            <select class="form-control" name="attr_type">
                                                <option value="Size">Size</option>
                                                <option value="Quantity">Quantity</option>
                                                <option value="Measurement">Measurement</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-4 mt-4">
                                        <div>
                                            <button type="button" class="btn btn-info" id="addbtn">Add+</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="addsection">
                                </div>

                                <div class="row my-4">
                                    <div class="col-xxl-3 col-md-4">
                                        <div>
                                        <label for="placeholderInput" class="form-label">Add Color Images</label>
                                            <button type="button" class="btn btn-info" id="addcolorbtn">Add+</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="addcolorsection">
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
@include("merchant.include.footer");

<script>
    $("#cat_id").on('change',function(){
            var category=$(this).val();
            // alert(category);
            $("#subcat_id").html("<option value=''>Select Subcategory</option>");
                $.ajax({
                    url:"{{ url('merchant/get_subcategory') }}",
                    type:'post',
                    data:'category='+category+'&_token={{ csrf_token() }}',
                    success:function(data){
                          $("#subcat_id").append(data);
                    }
                  });
        })
    $("#subcat_id").on('change',function(){
            var subcat_id=$(this).val();
            // alert(category);
            $("#megacat_id").html("<option value=''>Select Megacategory</option>");
                $.ajax({
                    url:"{{ url('merchant/get_megacategory') }}",
                    type:'post',
                    data:'subcat_id='+subcat_id+'&_token={{ csrf_token() }}',
                    success:function(data){
                          $("#megacat_id").append(data);
                    }
                  });


                 


    })
    $("#megacat_id").on('change',function(){
            let Segment=$(this).val();
            // alert(category);
            $("#Segment").html("<option value=''>Select Segment</option>");
                  $.ajax({
                    url:"{{ url('merchant/get_Segment') }}",
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
                    url:"{{ url('merchant/get_SubSegment') }}",
                    type:'post',
                    data:'category='+SubSegment+'&_token={{ csrf_token() }}',
                    success:function(data){
                          $("#SubSegment").append(data);
                    }
                  });
                });


                  $("#SubSegment").on('change',function(){
            let Group=$(this).val();
            //  alert(SubSegment);
            $("#Group").html("<option value=''>Select Group </option>");
                  $.ajax({
                    url:"{{ url('merchant/get_Group') }}",
                    type:'post',
                    data:'category='+Group+'&_token={{ csrf_token() }}',
                    success:function(data){
                          $("#Group").append(data);
                    }
                  });
                
               
                  
        });
        $("#Group").on('change',function(){
            let Group=$(this).val();
            //   alert(Group);
            $("#SubGroup").html("<option value=''>Select  Sub Group </option>");
                  $.ajax({
                    url:"{{ url('merchant/get_SubGroup') }}",
                    type:'post',
                    data:'category='+Group+'&_token={{ csrf_token() }}',
                    success:function(data){
                          $("#SubGroup").append(data);
                    }
                  });
                
               
                  
        });

    $("#addbtn").on('click',function(){
        $("#addsection").append('<div class="row my-4"><div class="col-xxl-3 col-md-3"><label for="placeholderInput" class="form-label">Attribute Value</label><input type="text" class="form-control" name="attr_value[]"  placeholder="eg. XL/ XXL / 50g / 100kg"></div><div class="col-xxl-3 col-md-3"><label for="placeholderInput" class="form-label">Market Price</label><input type="number" step="any" class="form-control" name="market_price[]"  placeholder="Enter MRP"></div><div class="col-xxl-3 col-md-3"><label for="placeholderInput" class="form-label">Sale Price</label><input type="number" step="any" class="form-control" name="sale_price[]"  placeholder="Enter Sale Price"></div><div class="col-xxl-2 col-md-2"><label for="placeholderInput" class="form-label">Stock</label><input type="number" step="any" class="form-control" name="stock[]"  placeholder="Enter Stock"></div><div class="col-xxl-1 col-md-1"><label for="placeholderInput" class="form-label">Remove</label><button type="button" class="btn btn-danger removebtn">-</button></div></div>');
    })

    $(document).on('click', '.removebtn', function () {
        //let index = $(this).closest('.row').index();
        $(this).closest('.row').remove();
    })

    $("#addcolorbtn").on('click',function(){
        $("#addcolorsection").append('<div class="row"><div class="col-xxl-5 col-md-5"><label for="placeholderInput" class="form-label">Select Color</label><select class="form-control" name="colors[]"><option value="">Select Color</option><option value="red">Red</option><option value="blue">Blue</option><option value="green">Green</option><option value="yellow">Yellow</option><option value="white">White</option><option value="black">Black</option></select></div><div class="col-xxl-6 col-md-6"><div><label for="placeholderInput" class="form-label">Image</label><input type="file" class="form-control" name="color_images[]"><span style="color:red;">Max image size 1000kb</span></div></div><div class="col-xxl-1 col-md-1"><label for="placeholderInput" class="form-label">Remove</label><button type="button" class="btn btn-danger removecolorbtn">-</button></div></div>');
    })

    $(document).on('click', '.removecolorbtn', function () {
        //let index = $(this).closest('.row').index();
        $(this).closest('.row').remove();
    })

    $('.product_price').keyup(function(e){
        let product_market_price = parseFloat($('#product_market_price').val());
        let product_discount_type = $('#product_discount_type').val();

        if(product_market_price > 0){
            let product_sale_price = parseFloat($('#product_sale_price').val());
            let product_discount = parseFloat($('#product_discount').val());

            if(product_sale_price > 0 && product_market_price > product_sale_price){
                 product_discount = product_market_price - product_sale_price;
                 if(product_discount_type == 'percentage'){
                    product_discount = parseFloat(product_discount/product_market_price).toFixed(2);
                 }
                 else{
                    product_discount = parseFloat(product_discount).toFixed(2);
                 }
                 $('#product_discount').val(product_discount);
            }
            else{
                $('#product_discount').val('');
                $('#product_sale_price').val('');
            }
        }
        else{
            $('#product_sale_price').val('');
            $('#product_discount').val('');
        }
    })


    $('#product_discount_type').change(function(e){
        let product_discount_type = $(this).val();
        let product_market_price = parseFloat($('#product_market_price').val());
        let product_sale_price = parseFloat($('#product_sale_price').val());
        let product_discount = parseFloat($('#product_discount').val());

        if(product_sale_price > 0 && product_market_price > product_sale_price){
            product_discount = product_market_price - product_sale_price;
            if(product_discount_type == 'percentage'){
                product_discount = parseFloat(product_discount/product_market_price).toFixed(2);
            }
            else{
                product_discount = parseFloat(product_discount).toFixed(2);
            }
            $('#product_discount').val(product_discount);
        }
    });





</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
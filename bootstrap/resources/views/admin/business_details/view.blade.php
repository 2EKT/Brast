@include("admin.include.header");
@include("admin.include.sidebar");
@php
    $today = date('Y-m-d');
    $first_day = date('Y-m-01');
@endphp

<link href="{{ asset('dashboard_assets/css/employee_business_details.css')}}" rel="stylesheet" type="text/css" />

        <!-- Vertical Overlay-->
        <div id="spinner_loader"></div>
        <div class="vertical-overlay"></div>

                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
              <div class="main-content d-none">
                   <div class="page-content">
                     <div class="container-fluid">
                      <div class="faq-body">
                        <table class="table-bordered">
                              <div class="container" style="margin-top: 20px;">
                                <div class="row" style="align-items: center;">
                                    <div class="col-md-2">
                                      <form>
                                          <label>From Date </label>
                                          <input type="date" id="from_date" name="from_date" value="{{$first_day}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                      </form>
                                    </div>
                                    <div class="col-md-2">
                                      <form>
                                          <label>To Date </label>
                                          <input type="date" id="to_date" name="to_date" value="{{$today}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                      </form>
                                    </div>
                                    <div class="col-md-4">
                                      <h1 class="text-center">Business Collection</h1>
                                    </div>
                                    <div class="col-md-4" style="text-align: right;">
                                      <button type="button" id="employee_report_btn" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                              </div>
                              <thead>
                                <tr>
                                    <th scope="col">ZONE NAME</th>
                                    <th scope="col">MERCHANT COLLECTIONS</th>
                                    <th scope="col">SUBSCRIPTION COLLECTION</th>
                                    <th scope="col">ADVERTERISE COLLECTIONS</th>
                                    <th scope="col">OTHER COLLECTION</th>
                                    <th scope="col">TOTAL COLLECTION</th>
                                    <th scope="col">GST</th>
                                    <th scope="col">NET COLLECTIONS</th>
                                    <th scope="col">EMPLOYEE COM.</th>
                                    <th scope="col">BLOCK COM</th>
                                    <th scope="col">DISTRICT COM</th>
                                    <th scope="col">ZONE COM</th>
                                </tr>
                              </thead>
                              <tbody id="Admin_business_collection">
                              </tbody>
                        </table>
                     </div>   

                           <div class="container">
                              <div class="row">
                                  <div class="col-md-3 mt-2">
                                    <div style="border: 1px solid #000;
                                        text-align: center;">
                                        <h5 style="background: #00b0f0;
                                          padding: 10px;
                                          color: #000;">Merchant Regd. Collections</h5>
                                        <p id="total_collection_by_merchants"></p>
                                    </div>
                                  </div>
                                  <div class="col-md-3 mt-2">
                                    <div style="border: 1px solid #000;
                                        text-align: center;">
                                        <h5 style="background: #76933c;
                                          padding: 10px;
                                          color: #000">Subscription Collections</h5>
                                        <p id="total_subscription_collection_by_merchants"></p>
                                    </div>
                                  </div>
                                  <div class="col-md-3 mt-2">
                                    <div style="border: 1px solid #000;
                                        text-align: center;">
                                        <h5 style="background: #ffc000;
                                          padding: 10px;
                                          color: #000">Adverterising Collections</h5>
                                        <p id="total_advertise_collection_by_merchants"></p>
                                    </div>
                                  </div>
                                  <div class="col-md-3 mt-2">
                                    <div style="border: 1px solid #000;
                                        text-align: center;">
                                        <h5 style="background: #7030a0;
                                          padding: 10px;
                                          color: #fff;">Others Collections</h5>
                                        <p id="total_other_collection_by_merchants"></p>
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-3 mt-2">
                                    <div style="border: 1px solid #000;text-align: center;">
                                        <h5 style="background: #000f00;padding: 10px;color: #fff">Total Collections</h5>
                                        <p id="all_total_collection_by_merchants"></p>
                                    </div>
                                  </div>
                                  <div class="col-md-3 mt-2">
                                    <div style="border: 1px solid #000;text-align: center;">
                                        <h5 style="background: #a80cad;padding: 10px;color: #fcf9fa">Employee Commission
                                        </h5>
                                        <p id="total_collection_by_EMPLOYEE_COM"></p>
                                    </div>
                                  </div>
                                  
                                    <div class="col-md-3 mt-2">
                                      <div style="border: 1px solid #000;text-align: center;">
                                          <h5 style="background: #a80cad;padding: 10px;color: #fcf9fa">Block Commission
                                          </h5>
                                          <p id="total_collection_by_Block_Commission"></p>
                                      </div>
                                    </div>
                                      <div class="col-md-3 mt-2">
                                        <div style="border: 1px solid #000;text-align: center;">
                                            <h5 style="background: #a80cad;padding: 10px;color: #fcf9fa">Distric Commission
                                            </h5>
                                            <p id="total_collection_by_Distric_Commission"></p>
                                        </div>
                                      </div>
                                        <div class="col-md-3 mt-2">
                                          <div style="border: 1px solid #000;text-align: center;">
                                              <h5 style="background: #a80cad;padding: 10px;color: #fcf9fa">Zone Commission
                                              </h5>
                                              <p id="total_collection_by_Zone_Commission"></p>
                                          </div>
                                        </div>
                                  <div class="col-md-3 mt-2">
                                    <div style="border: 1px solid #000;text-align: center;">
                                        <h5 style="background: #fabf8f;padding: 10px;color: #000">Total GST Amount</h5>
                                        <p id="total_gst_by_merchants"></p>
                                    </div>
                                  </div>
                                  <div class="col-md-3 mt-2">
                                    <div style="border: 1px solid #000;text-align: center;">
                                        <h5 style="background: #00b050;padding: 10px;color: #fff">Net Collections</h5>
                                        <p id="total_net_collection_by_merchants"></p>
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-3 mt-2">
                                    <div style="border: 1px solid #000;text-align: center;">
                                        <h5 style="background: #ff0000;padding: 10px;color: #fff;">Total Earnings</h5>
                                        <p id="total_earnings"></p>
                                    </div>
                                  </div>
                                  <div class="col-md-3 mt-2">
                                    <div style="border: 1px solid #000;text-align: center;">
                                        <h5 style="background: #00b0f0;padding: 10px;color: #000;">Scheme or Bonus</h5>
                                        <p id="bonus"></p>
                                    </div>
                                  </div>
                                  <div class="col-md-3 mt-2">
                                    <div style="border: 1px solid #000;text-align: center;">
                                        <h5 style="background: #0070c0;padding: 10px;color: #fff;">Company Wallet</h5>
                                        <p id="wallet_balance"></p>
                                    </div>
                                  </div>
                                  <div class="col-md-3 mt-2">
                                    <div style="border: 1px solid #000;text-align: center;">
                                        <h5 style="background: #00b050;padding: 10px;color: #fff;">Withdrawl Amount</h5>
                                        <p id="withdrawl_balance"></p>
                                    </div>
                                  </div>
                              </div>
                              {{-- <div class="text-center mt-4">
                                  <a href="" class="btn btn-lg btn-sucess" style="background: green;color: #fff;">Withdrawl Now</a>
                              </div> --}}
                            </div>
                          </div> <!-- container-fluid -->  
                     </div><!-- End Page-content -->
                </div> <!-- End Main-content-->
          
       


                @include("admin.include.footer");



<script>
      $(document).ready(function(e){
        generateReport();
      });

      $("#employee_report_btn").on('click',function(){
         generateReport();
      });

      function generateReport(){
           $('.main-content').addClass('d-none');
           $('#spinner_loader').show();
           let from_date = $('#from_date').val();
           let to_date = $('#to_date').val();
                $.ajax({
                    url:"{{ url('/admin/generate-report') }}",
                    type:'Get',
                    data:{
                      _token: "{{ csrf_token() }}",
                      from_date: from_date,
                      to_date: to_date,
                    },
                    success:function(data){
                        let collection_data = data.data;
                        let bonus = collection_data.bonus;
                        let merchants = collection_data.merchants;
                        let total_earnings = collection_data.total_earnings;
                        let total_estimation = collection_data.total_estimation;
                        let wallet_balance = collection_data.wallet_balance;
                        let withdrawl_balance = collection_data.withdrawl_balance;
                        let row = '';
                        let total_row = '';

                        $('#Admin_business_collection').empty();
                       
                        if(merchants.length > 0){
                          merchants.forEach((item, index) => {
                             row = row + '<tr>' + 
                                       '<th scope="row">' + item.name + '</th>' + 
                                       '<td>' + item.merchant_collection + '</td>' + 
                                       '<td>' + item.subscription_collection + '</td>' + 
                                       '<td>' + item.adverise_collection + '</td>' + 
                                       '<td>' + item.other_collection + '</td>' + 
                                       '<td>' + item.total_collection + '</td>' + 
                                       '<td>' + item.gst + '</td>' + 
                                       '<td>' + item.net_collection + '</td>' + 
                                       '<td>' +item.Employee_Com+ '</td>' + 
                                       '<td>' +item.Block_Com+ '</td>' + 
                                       '<td>' +item.Distric_Com+ '</td>' + 
                                       '<td>' +item.Zone_Com+ '</td>' + 
                                       '</tr>'; 
                                      });
                                      
                                      $('#Admin_business_collection').append(row);
                                      
                                      total_row = '<tr>' + 
                                        '<th scope="row">Total ' + total_estimation.total_block + '</th>' + 
                                        '<td>' + total_estimation.total_collection_by_merchants + '</td>' + 
                                        '<td>' + total_estimation.total_subscription_collection_by_merchants + '</td>' + 
                                        '<td>' + total_estimation.total_advertise_collection_by_merchants + '</td>' + 
                                        '<td>' + total_estimation.total_other_collection_by_merchants + '</td>' + 
                                        '<td>' + total_estimation.all_total_collection_by_merchants + '</td>' + 
                                        '<td>' + total_estimation.total_gst_by_merchants + '</td>' + 
                                        '<td>' + total_estimation.total_net_collection_by_merchants + '</td>' + 
                                        '<td>' + total_estimation.total_collection_by_EMPLOYEE_COM + '</td>' +  
                                        '<td>' + total_estimation.total_collection_by_BlOCK_COM + '</td>' +  
                                        '<td>' + total_estimation.total_collection_by_Distric_COM + '</td>' +  
                                        '<td>' + total_estimation.total_collection_by_Zone_COM + '</td>' +  
                                       '</tr>'; 
                          
                            $('#Admin_business_collection').append(total_row);
                            $("#total_collection_by_merchants").text(total_estimation.total_collection_by_merchants);
                            $("#total_subscription_collection_by_merchants").text(total_estimation.total_subscription_collection_by_merchants);
                            $("#total_advertise_collection_by_merchants").text(total_estimation.total_advertise_collection_by_merchants);
                            $("#total_other_collection_by_merchants").text(total_estimation.total_other_collection_by_merchants);
                            $("#all_total_collection_by_merchants").text(total_estimation.all_total_collection_by_merchants);
                            $("#total_gst_by_merchants").text(total_estimation.total_gst_by_merchants);
                            $("#total_net_collection_by_merchants").text(total_estimation.total_net_collection_by_merchants);
                            $("#total_collection_by_EMPLOYEE_COM").text(total_estimation.total_collection_by_EMPLOYEE_COM);
                            $("#total_collection_by_Block_Commission").text(total_estimation.total_collection_by_BlOCK_COM);
                            $("#total_collection_by_Distric_Commission").text(total_estimation.total_collection_by_Distric_COM);
                            $("#total_collection_by_Zone_Commission").text(total_estimation.total_collection_by_Zone_COM);
                            $("#total_earnings").text(total_earnings);
                            $("#bonus").text(bonus);
                            $("#wallet_balance").text(wallet_balance);
                            $("#withdrawl_balance").text(withdrawl_balance);
                            $('#spinner_loader').hide();
                            $('.main-content').removeClass('d-none');
                        }
                    }
                  });
      }
   
</script>

  

 
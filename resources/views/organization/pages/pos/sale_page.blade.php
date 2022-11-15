@extends('admin.layouts.pos')
@section('content')

<h2 class='hclass hid' hidden/> Mosa3eed </h2>
<div class="modal fade" id="code_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button class='no-print' type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class='no-print' class="modal-title" id="exampleModalLabel">خصم جديد</h4>
         </div>
         <div class="modal-body">
         </div>
         <div class="modal-footer">
            <button class='no-print' type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
            <button class='no-print' type="button" class="btn btn-primary">اضافة الخصم</button>
         </div>
      </div>
   </div>
</div>
@if(Session::has('success'))
<script>
   toastr.success(" {{ Session::get('success') }} ");
</script>
@endif
{{-- ////////// --}}
@if(Session::has('error'))
<script>
  Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
</script>
@endif
<div style="padding-left:16px">
   <h2  class="hclass no-print">Create Order :</h2>
   <table class='no-print' style="width:40%;">
      <th class='no-print' style="text-align:center;" > User Name : {{Auth::user()->name}}</th>
      <th class='no-print' style="text-align:center;" >User Type : {{Auth::user()->UserType->type}}</th>
   </table>
</div>
<br>
<div class="cont">
   <div class="container">
      <div class="col-sm-6 col-md-3" style="margin-top:-200px">
         <div  class="dl" style="height:320px">
            <div class="discount emerald" style="background:#2ecc71;color:#f1c40f;margin-top:-5px;padding:11px">
               <h3 class='no-print' style="margin-top:-4px">
                  Order Total :
               </h3>
            </div>
            {{-- <span class='test' id="test_total">1</span> --}}
            {{-- <input value="1" id="test_total"> --}}
            <div class="brand " style="font-size:40px;line-height:50px;padding-bottom:20px;color:#333;background:#f0f0f0">
               <span class='no-print' id="total_order">0</span> <label class='no-print' > : LE</label>
            </div>
            <div class="coupon midnight-blue" style="margin-top:-30px;height:150px;background-color:#333">
               <div class="form-group" style="margin-top:-10px;color:white">
                  <div class="form-inline">
                     <label class='no-print' for="exampleInputName2">Dicount %</label>
                     <input  type="text"  class="form-control no-print" style="margin:2px;width:50%;" id="ordDiscPers" placeholder="نسبة الخصم">
                  </div>
                  <div class="form-inline">
                     <label class='no-print' for="exampleInputName2">Discount</label>
                     <input  type="text"  class="form-control no-print" style="margin:2px;width:50%;"  id="ordDiscNum" placeholder="سعر الخصم">
                  </div>
                  <br>
                  <span class='no-print' id="total_order2">0</span> <label class='no-print' > :  الاجمالي بعد الخصم </label>
                  {{-- 
                  <div  id="code-2" class="collapse in code no-print" style="cursor: cell;margin:3px;width:100%">
                     اضافة فاتورة
                  </div>
                  --}}
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-9">
         <div class="form-inline test" action="#">
            <div class="form-group order_number" >
               {{-- <form class="form-inline" action="{{route('organization_sale_page.store')}}" method="post" enctype="multipart/form-data">
   @csrf --}}
               <label  >Order Number :</label>
                  <input type="text"  class="form-control pr"  id="order_number"  name="order_number" readonly>
               <label>Branch :</label>
               {{-- لو كان اليوزر مدير صيدليه هظهر كل الفروع ولو كان مدير فرع هظهر الفروع التابع لها من تابل userbranches --}}
               @if (Auth::user()->user_type_id == 4)
                <select  class="form-control" name="branch_id" id="branch">
                        <option value="">Select Branch</option>
                        @foreach ($branches as $branch)
                        <option value="{{$branch->branch_id}}" {{(old('branch_id')==$branch->id)? 'selected':''}}>{{$branch->Branch->name}}</option>
                        @endforeach
                     </select>   
               @endif
                @if (Auth::user()->user_type_id == 3)
                <select  class="form-control" name="branch_id" id="branch">
                        <option value="">Select Branch</option>
                        @foreach ($branches as $branch)
                        <option value="{{$branch->id}}" {{(old('branch_id')==$branch->id)? 'selected':''}}>{{$branch->name}}</option>
                        @endforeach
                     </select>   
               @endif
                     
             </div>
         
          <br><br>
            <div class="form-inline">
               
               <label class='no-print' >Qty :</label>
               <div class="form-group mb-2">
                  <input type="text" value="1"  style="width:50px" class="form-control no-print" id="qty" placeholder="Qty" name="qty" >
               </div>
               <label class='no-print' >Discount:</label>
               <div class="form-group mx-sm-3 mb-2">
                  <input type="text" value="0" style="width:50px" class="form-control no-print" id="discpersent" placeholder="Dicount" name="disc" > <label class='no-print'>%</label> 
               </div>
               <label class='no-print' >Discount:</label>
               <div class="form-group mx-sm-3 mb-2">
                  <input type="text" value="0" style="width:50px" class="form-control no-print" id="discnum" placeholder="Dicount" name="discNuma" >
               </div>
               <label class='no-print' >Medicin Code :</label>
               <div class="form-group mx-sm-3 mb-2">
                  <input type="text"  class="form-control no-print" id="barcode" placeholder="Barcode" name="product" autofocus autocomplete="off">
               </div>
               &nbsp;
               <button type="button"  onclick="window.print()" class="btn btn-info no-print" style="background-color:#333;">
                  <span class="glyphicon glyphicon-print  no-print"></span> </button>
            </div>
         </div>
      </div>
   </div>
</div>
<form class="form-inline" action="{{route('organization_sale_page.store')}}" method="post" enctype="multipart/form-data">
   @csrf
   <table border="1">
      <tr >
         <th style="text-align:center;" colspan="4">Product Details
         <th>
         <th style="text-align:center;"  colspan="2">Discount Details</th>
         <th style="text-align:center;" colspan="1">Price Details</th>
         <th>
      </tr>
      <tr style="padding:10px">
         <th style="text-align:center;">Medicin Code</th>
         <th style="text-align:center;">Medicin Name</th>
         <th style="text-align:center;">Product Price</th>
         <th style="text-align:center;">Qty</th>
         <th style="text-align:center;">Total</th>
         <th style="text-align:center;">%</th>
         <th style="text-align:center;">-</th>
         <th style="text-align:center;">Total Price</th>
         <th style="text-align:center;" class="no-print">Action</th>
      </tr>
      <tbody id="tbody">
      </tbody>
   </table>
   <input type="hidden"   id="order_number2"  name="order_number" >
   <input type="hidden"   id="branch_id"  name="branch_id" >
   <br>
   <div class="form-inline" style="margin-left: 150px;">

      <button type="submit"  class="btn btn-info no-print" style="background-color:#333;"><span class="glyphicon glyphicon-save"></span> Save</button>
   </div>
</form>
{{-- send form data --}}
<!-- <input type="text" class="form-control" value="0" id="total" disabled name="total"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   $(document).ready(function(){
           $('#barcode').on('keydown ', function (e) {
            console.log(e.keyCode);
              if (e.code === "Enter"){
               console.log('sadsa');
             
              
                 var product_id = $('#barcode').val();
                 var order_number = $('#order_number').val();
                 var qty = $('#qty').val();
                 var discnum = $('#discnum').val();
                 var discpersent = $('#discpersent').val();
                 var branch = $('#branch').val();
                
                 $.ajax({
                     url: "{{route('sale_store_ajax')}}",
                     type: "POST",
                     data: {
   					//   order_num: order_num,
                         product_id: product_id,
                         branch: branch,
                        order_number: order_number,
                        qty: qty,
                        discnum:discnum,
                        discpersent:discpersent,
                         _token: '{{csrf_token()}}'
                     },
                    success:function(response){
   					 if (response) {
                           // alert('a');
   						$('#tbody').append(response.result);
                     $('#total_order').text(parseFloat(parseFloat($('#total_order').text()) + parseFloat(response.total)).toFixed(2));     
                     $("#barcode").val("");
                     $("#barcode").focus();
                     if(response.error)
                     {
                          Swal.fire(
                           'Error For Qty!',
                           'Available Qty less than qty in branch!',
                           'error'
                           )
                     }
                     if(response.error_branch)
                     {
                          Swal.fire(
                           'Error For Select Branch!',
                           'Please Select Branch After Sale!',
                           'error'
                           )
                           $("#total_order").val(response.total);
                     }

   					 }
   				
                     },
                 });
   }
             });
      //////// for get value from select without submit form 
             $('#branch').on('change ', function (e) {
                 var branch = $('#branch').val();
                $("#branch_id").val(branch);

               //   var qty = $('#qty').val();
                
                 $.ajax({
                     url: "{{route('get_bill_number_ajax')}}",
                     type: "POST",
                     data: {
   					//   order_num: order_num,
                         branch: branch,
                         _token: '{{csrf_token()}}'
                     },
                    success:function(response){
   					 if (response) {
                           // alert('a');
   						$("#order_number").val(response.order_number);
                     $("#order_number2").val(response.order_number);
   					 }
                     },
                 });


             });
              ////////discount form 
             $('#ordDiscNum').on('keyup ', function (e) {
                 var total = $('#total_order').text();
			          var dicount = $(this).val();
                
                 $.ajax({
                     url: "{{route('get_order_disc_num_ajax')}}",
                     type: "POST",
                     data: {
                         total: total,
                         dicount: dicount,
                         _token: '{{csrf_token()}}'
                     },
                    success:function(response){
   					 if (response) {
                     // $('#total_order').text(parseFloat(parseFloat(response.total) - parseFloat(response.dic)).toFixed(2));
                     $('#total_order2').text(parseFloat(parseFloat(response.order_total_dic) ).toFixed(2));
   					 }
                     },
                 });


             });
             ///////////dicount persent
                    $('#ordDiscPers').on('keyup ', function (e) {
                 var total = $('#total_order').text();
			          var dicount = $(this).val();
                
                 $.ajax({
                     url: "{{route('get_order_disc_persent_ajax')}}",
                     type: "POST",
                     data: {
                         total: total,
                         dicount: dicount,
                         _token: '{{csrf_token()}}'
                     },
                    success:function(response){
   					 if (response) {
                     $('#total_order2').text(parseFloat(response.order_total_dic));

   					 }
                     },
                 });

             });
   });
   
</script>
@endsection
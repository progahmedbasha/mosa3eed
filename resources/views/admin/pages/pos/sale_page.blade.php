@extends('admin.layouts.pos')
@section('content')
<h2 class='hclass hid' hidden/> أســواق البــاشـــــــا </h2>
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
            <div class="brand " style="font-size:40px;line-height:50px;padding-bottom:20px;color:#333;background:#f0f0f0">
               <span class='no-print' id="total">0</span> <label class='no-print' > : LE</label>
            </div>
            <div class="coupon midnight-blue" style="margin-top:-30px;height:150px;background-color:#333">
               <div class="form-group" style="margin-top:-10px;color:white">
                  <div class="form-inline">
                     <label class='no-print' for="exampleInputName2">Dicount '%'</label>
                     <input  type="text" value="0" class="form-control no-print" style="margin:2px;width:50%;" id="ordDisc" placeholder="نسبة الخصم">
                  </div>
                  <div class="form-inline">
                     <label class='no-print' for="exampleInputName2">Discount '-'</label>
                     <input  type="text" value="0" class="form-control no-print" style="margin:2px;width:50%;"  id="ordDiscNum" placeholder="سعر الخصم">
                  </div>
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
         <div class="form-inline" action="#">
            <div class="form-group">
               <label  >رقم الفاتورة</label>
       
         <!-- customers -->
         <input type="text"  class="form-control pr" value="{{$order_number}}" id="order_number"  name="order_number" readonly>
         <label class='no-print'>
         اسم العامل
         <select class='no-print' id="staff_id" name="staff_id">
         <option readonly >{{Auth::user()->name}}</option>
         </select>
         </label>
         <label>
         اسم العميل
         <select class="pr2" id="client_id" name="client_id">
         </select>
         </label><br><br>
         </div>
         <div class="form-group">
         <label class='no-print' >عدد المنتج</label>
         <input type="text" value="1"  style="width:50px" class="form-control no-print" id="qty" placeholder="ادخل الرقم" name="qty" >
         <label class='no-print' >نسبة الخصم</label>
         <input type="text" value="0" style="width:50px" class="form-control no-print" id="disc" placeholder="ادخل الرقم" name="disc" > <label class='no-print'>%</label> 
         <label class='no-print' >سعر الخصم</label>
         <input type="text" value="0" style="width:50px" class="form-control no-print" id="discNuma" placeholder="ادخل الرقم" name="discNuma" >
         <label class='no-print' >رقم المنتج</label>
         <input type="text"  class="form-control no-print" id="barcode" placeholder="ادخل الرقم" name="product" autofocus>
         <button type="submit"  id="add_button" class="btn btn-info no-print" style="background-color:#333;">
         <span class="glyphicon glyphicon-save no-print"></span> اضافة </button>
         <button type="button"  windoonclick="w.print();" class="btn btn-info no-print" style="background-color:#333;">
         <span class="glyphicon glyphicon-print  no-print"></span> </button>
         <div class="form-group">
         </div>
         </div>
       
      </div>
   </div>
</div>
</div>
<form class="form-inline" action="{{route('sale_page.store')}}" method="post" enctype="multipart/form-data">
   @csrf
   <table border="1">
      <tr >
         <th style="text-align:center;" colspan="4">معلومات المنتج
         <th>
         <th style="text-align:center;"  colspan="2">معلومات الخصم</th>
         <th style="text-align:center;" colspan="1">معلومات السعر</th>
      </tr>
      <tr style="padding:10px">
         <th style="text-align:center;">رقم المنتج</th>
         <th style="text-align:center;">اسم المنتج</th>
         <th style="text-align:center;">الثمن</th>
         <th style="text-align:center;">الكمية</th>
         <th style="text-align:center;">المبلغ</th>
         <th style="text-align:center;">%</th>
         <th style="text-align:center;">-</th>
         <th style="text-align:center;">الاجمالي</th>
      </tr>
      <tbody id="tbody">
      </tbody>
   </table>
   <input type="hidden"  value="{{$order_number}}" id="order_number"  name="order_number" >
   <br>
   <div class="form-inline" style="margin-left: 150px;">
      <button type="submit" class="btn btn-info no-print" style="background-color:#333;">Save</button>
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
                
                 $.ajax({
                     url: "{{route('sale_store_ajax')}}",
                     type: "POST",
                     data: {
   					//   order_num: order_num,
                         product_id: product_id,
                        order_number: order_number,
                        qty: qty,
                         _token: '{{csrf_token()}}'
                     },
                    success:function(response){
   					 if (response) {
                           // alert('a');
   						$('#tbody').append(response.result);
                     $('#total_order').html(response.total_order);
                     $("#barcode").val("");
                     $("#barcode").focus();
   					 }
   				
                     },
                 });
   }
             });
   
   });
   
</script>
@endsection
<tr>
    <td> {{ @$product_bill->medicin_id }}  <input  type ="hidden" name="product_id[]" value="{{ $product_bill->medicin_id }}"/></td>
    <td>  {{ @$product_name->name }}</td>
    <td>  {{ @$product_bill->price }} <input  type ="hidden" name="price[]" class="item_price" value="{{ $product_bill->price }}"/></td>
    <td>  <input  type ="text" data-id="{{ $product_bill->id }}" name="qty[]" style="width:50px" class="form-control qty" value="{{ $product_bill->qty }}"/></td>
    <td class="first_price">  {{ $product_bill->qty * $product_bill->price }} </td>
    <td>--</td>
    <td>--</td>
    {{-- <td>  {{ @$price }}</td> --}}
    <td class="price">  {{ $product_bill->qty * $product_bill->price }} </td>
    <td class="no-print"><button type="button" data-id="{{ $product_bill->id }}" class="btn btn-danger delete_order_item delete" style="padding: 0px;" ><i class="glyphicon glyphicon-trash"></i> Delete</button></td>

</tr>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    //
        $('.delete').click(function(){
                    $(this).closest('tr').remove();
                    $id_product = $(this).attr('data-id');
                    $.ajax({
                            url: "{{route('sale_ajax_destroy')}}",
                            type: "Delete",
                            data: {
                                id_product: $id_product,
                                _token: '{{csrf_token()}}'
                            },

                                success:function(response){
                                    $('#total_order').text(parseFloat($('#total_order').text()) - parseFloat(response.price));
                                    // $('.total_qty').text(parseFloat($('.total_qty').text()) - parseFloat(response.qty));
                                }
                            });
                            
                            /** End Ajax Delete Roq **/
            });
    //
     //////////////////////  script fro updte qty  ///////////
	  	//   $(document).ready(function () {
          $('.qty').on('keyup', function () {
              var product_id = $(this).attr('data-id');
			  var qty = $(this).val();
			// var total_qty = $('.total_qty').text();
			var price = $(this).closest('tr').find('.item_price').val();
			//var price = $(this).find('.item-item_price').val();

				if(qty != ''){
					$.ajax({
                  url: "{{route('update_qty_ajax')}}",
                  type: "POST",
                  data: {
                      product_id: product_id,
					  qty: qty,
					//   total_qty:total_qty,
					  price:price,
                      _token: '{{csrf_token()}}'
                  },
				   context: this,
                 success:function(response){
					$(this).closest('tr').find('.price').text(response.total_price_item);
					var sum = 0;
						$('.price').each(function(){
							sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
						});
						$('#total_order').html(sum);
                        ///////////////////
                    $(this).closest('tr').find('.first_price').text(response.total_price_item);
					var sum = 0;
						$('.first_price').each(function(){
							sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
						});
						$('#total_order').html(sum);
                      

                  },
              });
				}
              

          });
        //   });
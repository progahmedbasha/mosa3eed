<tr>
    <td> {{ @$product_bill->medicin_id }}  <input  type ="hidden" name="product_id[]" value="{{ $product_bill->medicin_id }}"/></td>
    <td>  {{ @$product_name->name }}</td>
    <td>  {{ @$product_bill->price }} <input  type ="hidden" name="price[]" value="{{ $product_bill->price }}"/></td>
    <td>  {{ @$product_bill->qty }} <input  type ="hidden" name="qty[]" value="{{ $product_bill->qty }}"/></td>
    <td>  {{ @$price }} <input  type ="hidden" name="total_cost[]" value="{{ $price }}"/></td>
    <td>--</td>
    <td>--</td>
    <td>  {{ @$price }}</td>
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
<tr>
    <td> {{ @$product_bill->medicin_id }}  <input  type ="hidden" name="product_id[]" value="{{ $product_bill->medicin_id }}"/></td>
    <td>  {{ @$product_name->name }}</td>
    <td>  {{ @$product_bill->price }} <input  type ="hidden" name="price[]" value="{{ $product_bill->price }}"/></td>
    <td>  {{ @$product_bill->qty }} <input  type ="hidden" name="qty[]" value="{{ $product_bill->qty }}"/></td>
    <td>  {{ @$price }} <input  type ="hidden" name="total_cost[]" value="{{ $price }}"/></td>
    <td>--</td>
    <td>--</td>
    <td>  {{ @$price }}</td>
</tr>
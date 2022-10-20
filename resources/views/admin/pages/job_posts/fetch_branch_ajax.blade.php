@if($branchs->count() > 0 )
<select  class="form-control" name="color_id">
<option value="" >Select Branches</option>
@foreach ($branchs  as $branch)
<option value="{{ $branch->id }}">{{ $branch->name}}</option>
@endforeach
</select>	
@endif
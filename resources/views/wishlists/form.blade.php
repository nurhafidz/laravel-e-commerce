
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($wishlist)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($wishlist)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($wishlist)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($products as $key => $product)
			    <option value="{{ $key }}" {{ old('product_id', optional($wishlist)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


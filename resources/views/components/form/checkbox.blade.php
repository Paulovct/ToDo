<div class="input-area">
	<label for="{{$name}}">
		{{ $label }}
	</label>
	<input 
		id="{{ $name }}" 
		type="checkbox" 
		name="{{$name}}" 
	    {{ !empty($required) ? "required" : ""}}
	    @if($checked)
	    	checked
	    @endif
	    >
</div>
<div class="input-area">
	<label for="{{$name}}">
		{{ $label }}
	</label>
	<input 
		id="title" 
		placeholder="{{ $placeholder ?? "" }}" 
		type="{{ empty($type)? "text" : $type }}" 
		name="{{$name}}" 
	    {{ !empty($required) ? "required" : ""}}
	    value="{{ $value ?? "" }}">
</div>
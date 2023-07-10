<div class="input-area">
	<label for="{{$name}}">
		{{ $label ?? "" }}
	</label>
	<select 
		id="{{ $name }}" 
		name="{{ $name }}" 
		{{ !empty($required) ? "required" : ""}}
	>
		<option selected disabled value="">Seleciona uma opção.</option>
		{{ $slot }}
	</select>
</div>
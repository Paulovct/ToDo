<div class="task {{ $data->is_done ? "task_done" : "task_pending" }}">
	<div class="task-title">
		<input 
			type="checkbox" 
			onchange="taskUpdate(this)" 
			data-id="{{ $data->id }}" 
			{{ $data->is_done ? "checked" : "" }}
		>
		<h3>{{ $data->title }}</h3>
	</div>
	<div class="task-priority">
		<div class="rounded-full"></div>
		<p>{{ $data->category->title }}</p>
	</div>
	
	<div class="task-actions">
		<a href="http://localhost:8000/tasks/edit/{{ $data->id ?? "" }}">
			<img src="assets/images/icon-edit.png" alt="">
		</a>
		<hr>
		<a href="http://localhost:8000/tasks/delete/{{ $data->id ?? "" }}">
			<img src="assets/images/icon-delete.png" alt="">
		</a>
	</div>
</div>
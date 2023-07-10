<x-layout pageTitle="ToDo">

	<x-slot:btn>
		<a href="http://localhost:8000/categories/create" class="btn btn-primary">
			Criar Categoria
		</a>
		<a href="http://localhost:8000/tasks/create" class="btn btn-primary">
			Criar Tarefa
		</a>
		<a href="http://localhost:8000/logout" class="btn btn-primary">
			Sair
		</a>
	</x-slot:btn>

	<section class="graph">
		<div class="graph_header">
			<h2>Progresso do Dia</h2>
			<hr class="line_header" />
			
			<div class="graph-header-date">
				
				<a href="{{ route("home" ,[ "date" => $date["prev_button"] ]) }}">
					<img src="/assets/images/icon-prev.png" alt="">
				</a>
				{{ $date["now"] }}
				<a href="{{ route("home" ,[ "date" => $date["next_button"] ]) }}">
					<img src="/assets/images/icon-next.png" alt="">
				</a>
			</div>
		</div>
		<div class="graph_header-subtitle">
			Tarefas: <b> 
				{{ count($tasks->completeds) }} / {{ count($tasks) }}
		</b>
		</div>
		<div class="graph-placeholder">
			@if(count($tasks) > 0)
				{{ ceil((count($tasks->completeds) / count($tasks)) * 100 )}}%
			@else
				100%
			@endif
		</div>
		<div class="tasks_left_footer">
			<img src="/assets/images/icon-info.png" alt="">
			Restam 3 tarefas para serem realizadas.
		</div>
		
	</section>
	<section class="list">
		<div class="list-header">
			<select class="list-select" id="" onchange="changeStatusTaskFilter(this)">
				<option value="all_task">Todas as Tarefas</option>
				<option value="task_pending">Tarefas Pendentes</option>
				<option value="task_done">Tarefas Realizadas</option>
			</select>
		</div>
		<div class="task-list">
			
			@foreach($tasks as $task)
				@include("components.task" , ["data" => $task])
			@endforeach

		</div>
	</section>



	<script type="text/javascript">
		function changeStatusTaskFilter(e){
			if(e.value == "task_pending"){
				showAllTasks();
				document.querySelectorAll(".task_done").forEach((element)=>{
					element.style.display = "none";
				});
			} else if(e.value == "task_done"){
				showAllTasks();
				document.querySelectorAll(".task_pending").forEach((element)=>{
					element.style.display = "none";
				});
			} else {
				showAllTasks();
			}
		}

		function showAllTasks(){
			document.querySelectorAll(".task").forEach((element)=>{
				element.style.display = "block";
			})
		}
	</script>

	<script>
		async function taskUpdate(element){
			let status = element.checked;
			let taskId = element.dataset.id;
			let url = "{{ route("task.update") }}";
			
			let req = await fetch(url , {
				method:"POST",
				headers:{
					"Content-Type":"application/json",
					"accept":"application/json"
				},
				body:JSON.stringify({
					status , 
					taskId ,
					_token:"{{ csrf_token() }}"		
				})
			})

			let result = await req.json();
			if(result.success){
				alert("Tarefa Atualizada");
			} else {
				element.cheched = !status;
			}
		}
	</script>
</x-layout>


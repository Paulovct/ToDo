<x-layout pageTitle="Editar">

	<x-slot:btn>
		<a href="http://localhost:8000/register" class="btn btn-primary">
			Registre-se
		</a>
	</x-slot:btn>

<section id="task-section">
		<h1>Editar Tarefa</h1>
		
		<form action="/task/edit/{{ $task->id }}" method="POST">
			
			@csrf

			<input type="hidden" name="id" value="{{ $task->id }}">

			<x-form.checkbox 
				name="is_done" 
				label="Tarefa Concluida?" 
				checked="{{ $task->is_done }}"
			/>

			<x-form.textinput 
				name="title" 
				label="Titulo da tarefa" 
				required="required" 
				placeholder="Digite o titulo da tarefa."
				value="{{ $task->title }}"
			/>

			<x-form.textinput
				type="date" 
				name="due_date" 
				label="Data para conclusão" 
				required="required" 
				value="{{ $task->due_date }}"
			/>			


			<x-form.selectinput
				label="Categoria"
				name="category_id"
				required="required"
			>
				@foreach($categories as $category)
					<option  
						value="{{ $category->id }}"

						@if($category->id == $task->category->id)
							selected
						@endif

					>{{ $category->title }}</option>
				@endforeach
			</x-form.selectinput>
			

			<x-form.textarea 
				name="description"
				label="Descrição"
				placeholder="Digite uma descrição."
				value="{{ $task->description }}"
			/>

			<div class="inputArea">
				<x-form.button type="reset">Resetar</x-form.button>
				<x-form.button type="submit">Salvar</x-form.button>
			</div>

		</form>

	</section>

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
			} else {
				element.cheched = !status;
			}
		}
	</script>

</x-layout>
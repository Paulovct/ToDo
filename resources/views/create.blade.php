<x-layout pageTitle="Criar Tarefa">
	<x-slot:btn>
		<a href="http://localhost:8000/" class="btn btn-primary">
			Voltar
		</a>
	</x-slot:btn>

	<section id="task-section">
		<h1>Criar Tarefa</h1>
		
		<form action="/tasks/create" method="POST">
			
			@csrf

			<x-form.textinput 
				name="title" 
				label="Titulo da tarefa" 
				required="required" 
				placeholder="Digite o titulo da tarefa."
			/>

			<x-form.textinput
				type="date" 
				name="due_date" 
				label="Data para conclusão" 
				required="required" 
			/>			


			<x-form.selectinput
				label="Categoria"
				name="category_id"
				required="required"
			>
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->title }}</option>
				@endforeach
			</x-form.selectinput>
			

			<x-form.textarea 
				name="description"
				label="Descrição"
				placeholder="Digite uma descrição."
			/>

			<div class="inputArea">
				<x-form.button type="reset">Limpar</x-form.button>
				<x-form.button type="submit">Criar Tarefa</x-form.button>
			</div>

		</form>

	</section>

</x-layout>
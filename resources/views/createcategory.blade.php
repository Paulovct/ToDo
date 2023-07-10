<x-layout pageTitle="Criar Categoria">
	<x-slot:btn>
		<a href="http://localhost:8000/" class="btn btn-primary">
			Voltar
		</a>
	</x-slot:btn>

	<section id="task-section">
		<h1>Criar Categoria</h1>
		
		<form action="/categories/create" method="POST">
			
			@csrf

			<input type="hidden" value="{{ $user_id }}" name="user_id">

			<x-form.textinput 
				name="title" 
				label="Titulo da categoria" 
				required="required" 
				placeholder="Digite o titulo da categoria."
			/>			



			<div class="inputArea">
				<x-form.button type="reset">Limpar</x-form.button>
				<x-form.button type="submit">Criar Categoria</x-form.button>
			</div>

		</form>

	</section>

</x-layout>
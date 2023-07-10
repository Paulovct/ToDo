<x-layout pageTitle="Login">
	<x-slot:btn>
		<a href="http://localhost:8000/register" class="btn btn-primary">
			Não possui conta?
		</a>
	</x-slot:btn>

	<section id="task-section">
		<h1>Entrar</h1>
		
		@if($errors->any())
			<ul class="alert alert-error">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif

		<form action="login" method="POST">
			
			@csrf

			<x-form.textinput
				type="email" 
				name="email" 
				label="E-mail:"
				placeholder="Digite seu e-mail." 
				required="required" 
			/>			

			<x-form.textinput
				type="password" 
				name="password" 
				label="Senha:"
				placeholder="Digite sua senha." 
				required="required" 
			/>

			

			<div class="inputArea">
				<x-form.button type="reset">Limpar</x-form.button>
				<x-form.button type="submit">Entrar</x-form.button>
			</div>

		</form>

	</section>

</x-layout>
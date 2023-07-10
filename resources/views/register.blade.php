<x-layout pageTitle="Registrar-se">
	<x-slot:btn>
		<a href="http://localhost:8000/login" class="btn btn-primary">
			Já possui conta?
		</a>
	</x-slot:btn>

	<section id="task-section">
		<h1>Registrar-se</h1>
		
		@if($errors->any())
			<ul class="alert alert-error">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif

		<form action="/register" method="POST">
			
			@csrf

			<x-form.textinput
				type="text" 
				name="name" 
				label="Nome:" 
				required="required" 
				placeholder="Digite o seu nome"
			/>

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

			<x-form.textinput
				type="password" 
				name="password_confirmation" 
				label="Confirme sua senha:"
				placeholder="Confirme sua senha." 
				required="required" 
			/>			


			<div class="inputArea">
				<x-form.button type="reset">Limpar</x-form.button>
				<x-form.button type="submit">Registrar</x-form.button>
			</div>

		</form>

	</section>

</x-layout>
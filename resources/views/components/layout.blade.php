<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{{ $pageTitle ?? "ToDo App " }}</title>
		<link rel="stylesheet" href="/assets/css/style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="sidebar">
				<img src="/assets/images/logo.png" alt="">
			</div>
			<div class="content">
				<nav>
					
					{{ $btn ?? null }}
					
				</nav>
				<main>
					{{ $slot }}
				</main>
			</div>
		</div>
	</body>
</html>
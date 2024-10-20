<!DOCTYPE html>
<html class="dark" lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact - Register</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<?php include_once ('partials/tailwind.php') ?>
</head>
<body class="dark:bg-gray-950 bg-gray-50 min-h-screen">
	<!-- header -->
	<?php include_once ('partials/header.php') ?>

	<!-- main -->
	<main class="flex h-[calc(100vh_-_88px)] justify-center items-center">
		<form action="/register" method="POST" class="flex flex-col items-center gap-5 bg-blue-800 rounded-md p-10" id="login-form">
			<input class="py-2 px-4 rounded-md outline-none border-none" name="username" type="text" placeholder="Username">
			<input class="py-2 px-4 rounded-md outline-none border-none" name="email" type="email" placeholder="Email">
			<input class="py-2 px-4 rounded-md outline-none border-none" name="password" type="password" placeholder="Password">
			<input class="text-white bg-slate-800 w-max px-4 py-2 rounded-md" type="submit" value="Registrarse">
			<p class="text-white">¿Ya tienes cuenta? <a href="/login">Iniciar Sesion</a></p>
		</form>
	</main>	

	<!-- footer -->
	<?php include_once ('partials/footer.php') ?>
</body>
</html>

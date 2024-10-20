<!DOCTYPE html>
<html class="dark" lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact - Home</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<?php include_once ('partials/tailwind.php') ?>
</head>
<body class="dark:bg-gray-950 bg-gray-50">
	<!-- header -->
	<?php require 'partials/header.php' ?>

	<!-- main -->
	<main class="p-4">
		<section class="flex gap-5 w-[85vw]">
			<div class="flex flex-col gap-4 items-center bg-sky-950 w-[250px] h-max rounded-md">
				<img class="w-full" src="/img/avatar.png" alt="avatar">
				<div class="flex flex-col py-2">
					<p class="text-white">Nombre</p>	
					<p class="text-white">Email</p>
					<p class="text-white">phone</p>
				</div>
			</div>
		</section>
	</main>


	<!-- footer -->
	<?php require 'partials/footer.php' ?>
</body>
</html>

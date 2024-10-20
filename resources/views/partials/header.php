<header class="h-16 dark:bg-blue-800 flex justify-between items-center px-4">
	<h1 class="text-2xl text-white">App Contact</h1>
	<nav>
		<ul class="flex gap-5 items-center">
			<li><a class="text-white hover:border-white border-b-2 border-transparent" href="/">Home</a></li>
			<?php if (empty($_SESSION)): ?>
				<li><a class="text-white hover:border-white border-b-2 border-transparent" href="/login">Iniciar sesion</a></li>
				<li><a class="text-white hover:border-white border-b-2 border-transparent" href="/register">Registrarse</a></li>
			<?php else: ?>
				<li><a class="text-white hover:border-white border-b-2 border-transparent" href="/logout">Cerrar sesion</a></li>
			<?php endif; ?>
		</ul>
	</nav>
</header>

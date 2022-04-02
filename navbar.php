<?php error_reporting(E_ERROR | E_PARSE)?>
<!DOCTYPE html>
<html lang="hu">
	<head>
		<title>Magányos állatok</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="/style.css">
	</head>
	<body>
		<header class="navbar">
			<nav>
				<ul class="nav_links">
					<?php
					if (isset($_SESSION['uid'])): ?>
						<li><button onclick="window.location='/'">Elveszett állatok</button></li>
						<li><button onclick="window.location='/menhelyek'">Menhelyek</button></li>
						<li><button onclick="window.location='/menhelyiallatok'">Menhelyi állatok</button></li>
						<li><button onclick="window.location='/upload'">Elveszett állat feltöltése</button></li>
					<?php elseif (isset($_SESSION['mid'])): ?>
						<li><button onclick="window.location='/'">Elveszett állatok</button></li>
						<li><button onclick="window.location='/menhelyek'">Menhelyek</button></li>
						<li><button onclick="window.location='/menhelyiallatok'">Menhelyi állatok</button></li>
						<li><button onclick="window.location='/uploadmenhely'">Menhelyi állat feltöltése</button></li>
					<?php else: ?>
						<li><button onclick="window.location='/'">Elveszett állatok</button></li>
						<li><button onclick="window.location='/menhelyek'">Menhelyek</button></li>
						<li><button onclick="window.location='/menhelyiallatok'">Menhelyi állatok</button></li>
					<?php endif; ?>
				</ul>
			</nav>
				<?php
					if (isset($_SESSION['uid'])): ?>
						<button onclick="window.location='/user'">Fiók</button>
				<?php elseif (isset($_SESSION['mid'])): ?>
						<button onclick="window.location='/menhelyuser'">Menhely</button>
				<?php else: ?>
						<button onclick="window.location='/login'">Belépés</button>
				<?php endif; ?>
		</header>
	</body>
</html>
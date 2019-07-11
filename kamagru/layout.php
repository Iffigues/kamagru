<?php require_once('./session/user.php'); ?>
<?php require_once("./template/func/csrf.php"); ?>
<!DOCTYPE htmll>
  <html>
    <head>
	<link rel="icon" type="image/gif" href="./asset/favicon/ff.gif" />
	<link href="https://fonts.googleapis.com/css?family=Charm" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet"  href="./asset/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    </head>
    <body>
	<header class="flex-container">
	 <div><a class="btn-floating btn-large red pulse" href="/"><i class="material-icons">Camagru</i></a></div>
	<?php if(connected()): ?>
		<div><a class="btn-floating btn-large red pulse" href="?page=profile"><i class="material-icons">Profile</i></a></div>
		<div><a class="btn-floating btn-large red pulse" href="?page=make"><i class="material-icons">Make</i></a></div>
		<div><a class="btn-floating btn-large red pulse" href=<?php echo "?page=logout&token=".addToken('logout') ?>><i class="material-icons">Logout</i></a></div>
	<?php else: ?>
	<div><a class="btn-floating btn-large red pulse" href="?page=login"><i class="material-icons">Login</i></a></div>
	<div><a class="btn-floating btn-large red pulse" href="?page=register"><i class="material-icons">Register</i></a></div>
	<?php endif ?>
  	<div><a class="btn-floating btn-large red pulse" href="?page=galerie"><i class="material-icons">Galerie</i></a></div>  
	</header>
	<main>
		<?= $content ?>
	</main>
	<footer>
	</footer>
    </body>
  </html>

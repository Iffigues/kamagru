<?php require_once('./template/func/csrf.php'); $t = addToken("login");?>
<?php if (!isset($_SESSION['co']) || !$_SESSION['co']): ?>
<?php if ($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] == "POST"): ?>
<section>
	<div class="row">
    <form class="col s12" action="?page=login" method="POST">
	<input name="token" style="display:none;" type="text" value=<?php echo $t; ?>>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="text" name="mail" class="validate">
        </div>
      </div>
	<div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" name="pwd" class="validate">
        </div>
      </div>
	<div class="row">
		<div class="input-field col s12">
				<input type="submit" value="Ok">
		</div>
	</div>
    </form>
	<div class="col s12">
		<a href="?page=forgot"><i class="material-icons">Password Forgot?</i></a>
	</div>
  </div>
</section>
<?php endif?>
<?php else: ?>
<?php endif ?>

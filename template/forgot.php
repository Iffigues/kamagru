<?php require_once('./template/func/csrf.php'); $t = addToken("forgot");?>
<?php if (!isset($_SESSION['co']) || !$_SESSION['co']): ?>
<?php if ($_SERVER['REQUEST_METHOD'] == "GET"): ?>
<section>
	<div class="row">
	<form class="col s12" action="?page=forgot" method="POST">
	<input name="token" style="display:none;" type="text" value=<?php echo $t; ?>>
	<div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" name="mail" class="validate">
        </div>
      	</div>
	<div class="row">
		<div class="input-field col s12">
			<input type="submit" value="Ok">
		</div>
	</div>
    </form>
  </div>
</section>
<?php endif?>
<?php endif ?>


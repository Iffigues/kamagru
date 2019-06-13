<?php if (!isset($_SESSION['co']) || !$_SESSION['co']): ?>
<?php if ($_SERVER['REQUEST_METHOD'] == "GET"): ?>
<section>
	<div class="row">
    <form class="col s12" action="?page=recover" method="POST">
	<input name="cle" style="display:none;" type="text" value=<?php echo $_GET['cle']; ?>>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="password" name="password" class="validate">
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
  </div>
</section>
<?php endif?>
<?php else: ?>
already connected
<?php endif ?>

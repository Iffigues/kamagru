<?php if ($_SERVER['REQUEST_METHOD'] == "POST"): ?>
<?php require_once("./template/func/user.php"); new_user(); ?>
<?php endif ?>
<?php if ($_SERVER['REQUEST_METHOD'] == "GET"): ?>
	<section>
	<div class="row">
    <form class="col s12" action="?page=register" method="POST">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="login" id="first_name" name="login" type="text" class="validate">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password" placeholder="password">
        </div>
      </div>
	<div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password2" placeholder="password">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" name="email" placeholder="email">
        </div>
      </div>
	<div class="row">
	<div class="input-field col s6">	
	<input type="submit" value="register">
	</div>
	</div>
    </form>
  </div>
	</section>
<?php endif ?>

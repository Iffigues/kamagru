<?php require_once('./template/func/csrf.php'); $t = addToken("action");?>
  <blockquote>
	login   
 </blockquote>
<form class="col s12" action="?page=login" method="POST">
	<input name="token" style="display:none;" type="text" value=<?php echo $t; ?>>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" name="mail" class="validate">
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
  <blockquote>
	email   
 </blockquote>
<form class="col s12" action="?page=login" method="POST">
	<input name="token" style="display:none;" type="text" value=<?php echo $t; ?>>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" name="mail" class="validate">
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
  <blockquote>
	password   
 </blockquote>
<form class="col s12" action="?page=profile&action=pwd" method="POST">
	<input name="token" style="display:none;" type="text" value=<?php echo $t; ?>>
      <div class="row">
        <div class="input-field col s12">
          <input  type="password" name="pwd" class="validate">
        </div>
      </div>
	<div class="row">
        <div class="input-field col s12">
          <input type="password" name="pwd1" class="validate">
        </div>
      </div>
	<div class="row">
        <div class="input-field col s12">
          <input  type="password" name="pwd2" class="validate">
        </div>
      </div>
	<div class="row">
		<div class="input-field col s12">
				<input type="submit" value="Ok">
		</div>
	</div>
    </form>
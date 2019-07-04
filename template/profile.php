<?php require_once('./template/func/csrf.php'); $t = addToken("action"); require_once("./template/func/checked.php"); $rrr = checked();  $rr = $rrr['accept'];?>
  <blockquote>
	login   
 </blockquote>
<form class="col s12" action="?page=profile&action=email" method="POST">
	<input name="token" style="display:none;" type="text" value=<?php echo $t; ?>>
      <div class="row">
	<div class="input-field col s12">
	  <input  type="email" name="email" class="validate">
	</div>
      </div>
	<div class="row">
	<div class="input-field col s12">
	  <input  type="email" name="email1" class="validate">
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
<form class="col s12" action="?page=profile&action=login" method="POST">
	<input name="token" style="display:none;" type="text" value=<?php echo $t; ?>>
      <div class="row">
	<div class="input-field col s12">
	  <input type="text" name="login" class="validate">
	</div>
      </div>
	<div class="row">
	<div class="input-field col s12">
	  <input type="text" name="login1" class="validate">
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
 <blockquote>
	received notification 
 </blockquote>
<form class="col s12" action="?page=profile&action=accept" method="POST">
	<input name="token" style="display:none;" type="text" value=<?php echo $t; ?>>
	 <p>
      <label>
	<?php if ($rr): ?>
		<input type="checkbox" checked="checked" name="accept"/>
	<?php else: ?>
		<input type="checkbox" name="accept" />
	<?php endif?>
        <span>Accept</span>
      </label>
    </p>
	<input type="submit" value="Ok">
</form>

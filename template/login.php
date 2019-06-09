<?php if (!$_SESSON['co']): ?>
<?php if ($_SERVER['REQUEST_METHOD'] == "GET"): ?>
<section>
	<div class="row">
    <form class="col s12">
      <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
	<div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
    </form>
  </div>
</section>
<?php endif?>
<?php else: ?>
already connected
<?php endif ?>

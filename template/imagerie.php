<?php require_once("./template/func/galerie.php"); $a = getimg($_GET['id']); ?>
<div class="container">
<div class="row">
	<img class="col s12" src=<?php echo "./api/".$a['path'] ?>></img>
	<center class="col s12"><p>I like it</p></center>
<div>
<?php if(isset($_SESSION['co']) && $_SESSION['co']): ?>
<div class="row">
	<div class="col s12"><center><h3>Post Comment</h3></center></div>
	<textarea id="story" name="story" class="col s12" rows="5" cols="33" style="resize:none;"></textarea>
</div>
<?php endif; ?>
</div>

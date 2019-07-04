<?php require_once("./template/func/galerie.php"); $a = getimg($_GET['id']); ?>
<div class="container">
	<div class="row">
		<img class="col s12"  id=<?php echo $a[0]['id'];?> src=<?php echo "./api/".$a[0]['path'] ?>></img>
		<center class="col s12"><p>I like it</p></center>
	<div>
<?php if(isset($_SESSION['co']) && $_SESSION['co']): ?>
<div class="row">
	<div class="col s12"><center><h3>Post Comment</h3></center></div>
	<textarea id="story" name="story" class="col s12" rows="5" cols="33" style="resize:none;"></textarea>
	<button id="me" class="col s12 green" >SEND MESSAGE</button>
</div>
<?php endif; ?>
<div class="row" id="haha">
	<?php foreach($a[1] as $pd): ?>
	<div class="row"><center><p>Auteur : <?php echo $pd['author']; ?>,    posted: <?php echo $pd['date']; ?></p></center></div>
		<div class="row"><p><?php echo $pd['mess']; ?></p></div>
	<?php endforeach; ?>
</div>
</div>
<?php if (isset($_SESSION['co']) && $_SESSION['co']): ?>
<script type="text/javascript" src="./asset/js/mess.js"></script>
<?php endif; ?>
<script type="text/javascript" src="./asset/js/aff.js"></script>

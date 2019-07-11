<?php require_once("./template/func/galerie.php"); $a = getimg($_GET['id']); ?>
<?php require_once("./template/func/like.php"); $t = like($_GET['id']);?>
<div class="container">
	<div class="row">
		<img class="col s12"  id=<?php echo $a[0]['id'];?> src=<?php echo "./api/".$a[0]['path'] ?>></img>
		<?php if(isset($_SESSION['co']) && $_SESSION['co']): ?>
			<?php if (!$t): ?>
				<center class="col s12"><p id="like">I like it</p></center>
			<?php else: ?>
				<center class="col s12"><p id="dislike">Dislike</p></center>
			<?php endif ?>
		<?php  endif ?>
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
	<?php $pseudo = htmlspecialchars($pd['author']); $pp = htmlspecialchars($pd['mess']); ?>
	<div class="row"><center><p>Auteur : <?php echo $pseudo; ?>,    posted: <?php echo $pd['date']; ?></p></center></div>
		<div class="row"><p><?php echo $pp; ?></p></div>
	<?php endforeach; ?>
</div>
</div>
<?php if (isset($_SESSION['co']) && $_SESSION['co']): ?>
<script type="text/javascript" src="./asset/js/mess.js"></script>
<?php endif; ?>
<script type="text/javascript" src="./asset/js/aff.js"></script>

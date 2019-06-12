<?php session_start();?>
<?php ob_start();?>
<?php if (isset($_GET['page']) && file_exists("./template/".$_GET['page'].".php")): ?>
	<?php require_once("./template/func/dispatch.php");?>
	<?php dispatch($_GET['page'].".php")?>
<?php else:?>
	<?php require_once('./template/home.php')?>
<?php endif ?>
<?php $content = ob_get_clean();?>
<?php require_once('layout.php');?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && $_SESSION['co']) {
	echo json_decode($_POST['img']);
}

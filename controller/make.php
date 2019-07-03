<?php
if (isset($_SESSION['co']) && $_SESSION['co']) {
	require_once('./template/make.php');
} else {
	echo "Fils de Pute";
}

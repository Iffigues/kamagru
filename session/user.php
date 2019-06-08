<?php
function connected() {
	if (isset($_SESSION['co']) && $_SESSION['co'] == true) {
		return true;
	}
	return false;
}

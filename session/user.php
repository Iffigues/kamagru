<?php
function connected() {
	if (isset($_SESSION['co']) && $_SESSION['co'] == 1) {
		return 1;
	}
	return false;
}

(function() {
	function fn() {
		var video = document.getElementById('video');
		var canvas = document.getElementById('canvas');
		var width = video.videoWidth;
		var height = video.videoHeight;
		canvas.width = video.videoWidth;
		  canvas.height = video.videoHeight;
	}
	setTimeout(function() { fn(); }, 1000);
	fn();
	video.onresize = fn();
	window.addEventListener('load', fn, false);
	window.addEventListener("DOMContentLoaded", (event) => {fn();});
})();

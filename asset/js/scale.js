(function() {
	function fn() {
		var height = 0;
		var video = document.getElementById('video');
		var canvas = document.getElementById('canvas');
		var width = video.videoWidth;
		height = video.videoHeight / (video.videoWidth/width);
		      video.setAttribute('width', width);
		      video.setAttribute('height', height);
		      canvas.setAttribute('width', width);
		      canvas.setAttribute('height', height);
	}
	window.addEventListener('load', fn, false);
			window.addEventListener("DOMContentLoaded", (event) => {
				    fn();
				  });
})();

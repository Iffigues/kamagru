(function() {
	function update(stream) {
		document.querySelector('video').src = stream.url;
	}
	navigator.getMedia = ( navigator.getUserMedia ||
		navigator.webkitGetUserMedia ||
		navigator.mozGetUserMedia ||
		navigator.msGetUserMedia);
	function hasGetUserMedia() {
		return !!(navigator.mediaDevices &&
			navigator.mediaDevices.getUserMedia);
	}
	if (hasGetUserMedia()) {
	} else {
		alert('getUserMedia() is not supported by your browser');
	}
	const constraints = {
		video: true,
		audio: false 
	};
	const video = document.querySelector('video');
	navigator.mediaDevices.getUserMedia(constraints).then((stream) => {video.srcObject = stream}).catch(error => {});
	const videoElement = document.querySelector('video');
	navigator.mediaDevices.enumerateDevices().then(gotDevices).then(getStream).catch(handleError);
	function gotDevices(deviceInfos) {
		for (let i = 0; i !== deviceInfos.length; ++i) {
			const deviceInfo = deviceInfos[i];
			const option = document.createElement('option');
			option.value = deviceInfo.deviceId;
			if (deviceInfo.kind === 'audioinput') {
			} else if (deviceInfo.kind === 'videoinput') {
			} else {}
		}
	}
	function getStream() {
		if (window.stream) {
			window.stream.getTracks().forEach(function(track) {
				track.stop();
			});
		}
		const constraints = {
			video: {}
		};
		navigator.mediaDevices.getUserMedia(constraints).
			then(gotStream).catch(handleError);
	}
	function gotStream(stream) {
		window.stream = stream;
		videoElement.srcObject = stream;
	}
	function handleError(error) {}
})();


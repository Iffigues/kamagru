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
	navigator.mediaDevices.getUserMedia(constraints).
		then((stream) => {video.srcObject = stream});
	const videoElement = document.querySelector('video');
	//const audioSelect = document.querySelector('video');
	//const videoSelect = document.querySelector('video');
	navigator.mediaDevices.enumerateDevices()
		.then(gotDevices).then(getStream).catch(handleError);
	//audioSelect.onchange = getStream;
	//videoSelect.onchange = getStream;
	function gotDevices(deviceInfos) {
		for (let i = 0; i !== deviceInfos.length; ++i) {
			const deviceInfo = deviceInfos[i];
			const option = document.createElement('option');
			option.value = deviceInfo.deviceId;
			if (deviceInfo.kind === 'audioinput') {
				/*option.text = deviceInfo.label ||
					'microphone ' + (audioSelect.length + 1);
				audioSelect.appendChild(option);*/
			} else if (deviceInfo.kind === 'videoinput') {
				//option.text = deviceInfo.label || 'camera ' +
				//	(videoSelect.length + 1);
				//videoSelect.appendChild(option);
			} else {
				//console.log('Found another kind of device: ', deviceInfo);
			}
		}
	}
	function getStream() {
		if (window.stream) {
			window.stream.getTracks().forEach(function(track) {
				track.stop();
			});
		}
		const constraints = {
			//audio: {
				//deviceId: {exact: audioSelect.value}
			//},
			video: {
				//deviceId: {exact: videoSelect.value}
			}
		};
		navigator.mediaDevices.getUserMedia(constraints).
			then(gotStream).catch(handleError);
	}
	function gotStream(stream) {
		window.stream = stream; // make stream available to console
		videoElement.srcObject = stream;
	}
	function handleError(error) {
		console.error('Error: ', error);
	}
})();


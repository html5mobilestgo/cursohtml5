	$(document).ready(function(){
			$('buttton#full').on('click', function(){
				console.log("pulsado");
				var video=$('video#v');
				if (video[0].requestFullScreen) {
					console.log("normal");
					video[0].requestFullScreen();
				}
				if (video[0].mozrequestFullScreen) {
					console.log("moz");
					video[0].mozrequestFullScreen();
				}
				if (video[0].webkitrequestFullScreen) {
					console.log("webkit");
					video[0].webkitrequestFullScreen();
				}
			});
		});
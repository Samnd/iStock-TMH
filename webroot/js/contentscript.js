	function videoClick(x) {
			if (x.children[0].paused) {
				x.children[0].play();
				$(x).children('.playbutton').fadeOut();
			} else {
				x.children[0].pause();
				$(x).children('.playbutton').fadeIn();

			}
	}

	function checkPermission() {
		// body...
		var loggingIn = $('#logging_in').text();
		var owner = $('#owner').text();

		if (loggingIn == owner) {
			return true;
		} else {
			alert("You don\'t have permission to do that!!!");
			return false;
		}
	}
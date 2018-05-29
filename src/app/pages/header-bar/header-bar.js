$(document).ready(function() {
	if (document.URL.substr(document.URL.lastIndexOf('/') + 1) == "home") {
		activeHomeLink();
	} else {
		activePathoLink();
	}
});

$("#disconnectBtn").click(function(e) {
    disconnect();
});

$("#home-link").click(function(e) {
	activeHomeLink();
});

function activeHomeLink() {
	document.getElementById("home-link").classList.add('active');
	document.getElementById("patho-link").classList.remove('active');
}

$("#patho-link").click(function(e) {
	activePathoLink();
});

function activePathoLink() {
	document.getElementById("home-link").classList.remove('active');
	document.getElementById("patho-link").classList.add('active');
}

function disconnect() {
	var request = new XMLHttpRequest();

	request.open('GET', '/acuponture/src/app/scripts/user-disconnect.php', true);
	request.onreadystatechange = function (aEvt) {
		if (request.readyState === 4) {
			if (request.status == 200) {
				if (request.responseText == "true") {
					window.location.reload(true);
				} else {

				}
			} else {

			}
		}
	};
	request.send(null);
}
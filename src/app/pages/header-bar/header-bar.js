$(document).ready(function() {
	var user = localStorage.getItem('user');

});

$("#disconnectBtn").click(function(e) {
    disconnect();
});

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
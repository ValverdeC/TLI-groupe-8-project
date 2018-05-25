$("#sendCredentials").click(function(e) {
	connexion();
});

function connexion() {
	var connexionForm = document.getElementById("connexionForm");
	var request = new XMLHttpRequest(), 
		email = connexionForm.connexionEmail.value, 
		password = connexionForm.connexionPwd.value;
	request.open('GET', '/acuponture/src/app/scripts/user-connexion.php?email='.concat(email).concat("&&password=").concat(password), true);
	request.onreadystatechange = function (aEvt) {
		if (request.readyState === 4) {
			if (request.status === 200) {
				if (request.responseText === "false") {

				} else if (request.responseText === "true") {
					localStorage.setItem('user', request.responseText);
					window.location.reload(true);
				}
			}
		}
	};
	request.send(null);
}

$("#createUserBtn").click(function(e) {
    createUser();
});

function createUser() {
	var userForm = document.getElementById("userForm");
	var request = new XMLHttpRequest(), 
		pseudonyme = userForm.pseudonyme.value, 
		email = userForm.email.value, 
		password = userForm.password.value;
	request.open('GET', '/acuponture/src/app/scripts/user-inscription.php?pseudonyme='.concat(pseudonyme).concat("&&email=").concat(email).concat("&&password=").concat(password), true);
	request.onreadystatechange = function (aEvt) {
		if (request.readyState === 4) {
			if (request.status === 200) {
				if (request.responseText === "emailAndPseudoAlreadyExist") {

				} else if (request.responseText === "emailAlreadyExist") {
					
				} else if (request.responseText === "PseudoAlreadyExist") {
					
				} else {
					localStorage.setItem('user', request.responseText);
					window.location.reload(true);
				}
			}
		}
	};
	request.send(null);
}
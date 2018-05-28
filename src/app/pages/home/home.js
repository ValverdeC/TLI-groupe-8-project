$("#notify-alert").hide();

$("#sendCredentials").click(function(e) {
	connexion();
});

function connexion() {
	var connexionForm = document.getElementById("connexionForm");
	var request = new XMLHttpRequest(), 
		email = connexionForm.connexionEmail.value, 
		password = connexionForm.connexionPwd.value;
	request.open('GET', 'src/app/scripts/user-connexion.php?email='.concat(email).concat("&&password=").concat(password), true);
	request.onreadystatechange = function (aEvt) {
		if (request.readyState === 4) {
			if (request.status === 200) {
				if (request.responseText !== "true") {
					addNotification(request.responseText);
				} else {
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
	request.open('GET', 'src/app/scripts/user-inscription.php?pseudonyme='.concat(pseudonyme).concat("&&email=").concat(email).concat("&&password=").concat(password), true);
	request.onreadystatechange = function (aEvt) {
		if (request.readyState === 4) {
			if (request.status === 200) {
				if (request.responseText === "emailPseudoUsed") {
					addNotification("Cet email et ce pseudonyme sont déjà utilisés ...");
				} else if (request.responseText === "emailUsed") {
					addNotification("Cet email est déjà utilisé ...");
				} else if (request.responseText === "PseudoUsed") {
					addNotification("Ce pseudonyme est déjà utilisé ...");
				} else if (request.responseText === "emptyFields") {
					addNotification("Merci de renseigner tous les champs !");
				} else if (request.responseText === "false") {
					addNotification("Erreur lors de la création de l'utilisateur !");
				} else {
					localStorage.setItem('user', request.responseText);
					window.location.reload(true);
				}
			}
		}
	};
	request.send(null);
}

function addNotification(text) {
	var id = new Date().getTime();
	$('#alert-placeholder').html($('#alert-placeholder').html() + '<div id="' + id + '" class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-text">' + text + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	setTimeout(function () {
		$("#" + id).hide();
	}, 2500);
} 
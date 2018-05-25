$(document).ready(function() {
    var connexionBox = document.getElementById('connexionBox');
    
    

    checkCredentials();
});

function checkCredentials() {
	/*if (checkPassword(formInscription) === true && checkEmail(formInscription) === true) {*/
		var request = new XMLHttpRequest(), 
			pseudonyme = "Corentin", 
			email = "corentin@gmail.com", 
			password = "Corentin";
		request.open('GET', '/acuponture/src/app/scripts/user-inscription.php?pseudonyme='.concat(pseudonyme).concat("&&email=").concat(email).concat("&&password=").concat(password), true);
		request.onreadystatechange = function (aEvt) {
			if (request.readyState === 4) {
				if (request.status === 200) {
					if (request.responseText === "userCreated") {
                        console.log("OK");
						/*formInscription.style.display = "None";
						changeIHMErrorMessageInsc("");
						document.getElementById("successInsc").innerHTML = "Utilisateur créé !\n Vous pouvez maintenant vous connecter. (" + formInscription.email_inscription.value + ")";*/
					} else if (request.responseText === "emailAndPseudoAlreadyExist") {
                        console.log("Les 2");
						/*changeIHMErrorMessageInsc("Cet email et ce pseudo sont déjà utilisés.");*/
					} else if (request.responseText === "emailAlreadyExist") {
                        console.log("email");
						/*changeIHMErrorMessageInsc("Cet email est déjà utilisé.");*/
					} else if (request.responseText === "PseudoAlreadyExist") {
                        console.log("pseudo");
						/*changeIHMErrorMessageInsc("Ce pseudo est déjà utilisé.");*/
					}
				}
			}
		};
		request.send(null);
		/*formInscription.identifiant_inscription.setCustomValidity("");*/
	/*} else {
		return false;
	}*/
}
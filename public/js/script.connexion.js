// LE DOM

const bouton = document.getElementById("bouton");
const password = document.getElementById("password");
const email = document.getElementById("email");







// Fonction pour recupérer les valeurs des champs
function recuperer() {
    var valid = true;
    // const valeurUser = user.value.trim()
    const valeurpassword = password.value.trim()
    const valeurEmail = email.value.trim()


    // const valeurpassword2 = password2.value.trim()
    // *************************************************************************
    if (valeurpassword === "") {
        afficheErreur(password, "Veillez saisir votre password")
            // alert("non");
        valid = false;
    } else {
        valid = validMotPasse(password);
    }


    // ***********************************************************
    if (valeurEmail === "") {
        afficheErreur(email, "Veillez saisir votre email")
        valid = false;
    } else {
        valid = ValidateEmail(email);
    }

    return valid;
    // ****************************************************************
    // if (validMotPasse(password) == true && ValidateEmail(email) == true) {
    //     return true;
    // }

}

// *******************************LES FONCTIONS********************************************
function afficheErreur(input, message) {
    const formControl = input.parentElement;
    // const small = formControl.querySelector('small');
    const small = formControl.querySelector('small');
    // Affichage d'erreur avec small
    small.innerText = message;
    // La classe erreur
    formControl.className = 'form-controle error';
    return false;
}

// Affiche succes
function afficheSucess(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-controle succes';
    return true;


}


// Fonction de validation de mail front
function ValidateEmail(inputText) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputText.value.match(mailformat)) {
        afficheSucess(email)

        return true;
    } else {
        afficheErreur(email, "le format de votre email est invalide");
        // email.focus();
        return false;
    }


}


// Fonction pour valider le password
function validMotPasse(input) {
    var formPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
    if (input.value.match(formPassword)) {

        afficheSucess(password);
        return true;

    } else {
        afficheErreur(password, "password est invalide")

        return false;
    }

}








// Evenement 
bouton.addEventListener('click', (e) => {
    if (!recuperer()) {
        e.preventDefault();
    }


});
const typeQuestion = document.getElementById("typeQuestion");
const typeRep = document.getElementById("typeRep");
const reponse = document.getElementById("reponse");
const supprime = document.getElementById("supprime");
const reponseFinal = document.getElementById("reponseFinal");
const repCheck = document.getElementById("repCheck");
const repText = document.getElementById("repText");
const image = "/img/icones/ic-supprimer.png";

// **************************AJOUTER***********************************
typeRep.onclick = function() {
    var newDiv = document.createElement("div");
    newDiv.setAttribute("class", "reponse");
    // newDiv.setAttribute("", "reponse");

    reponseFinal.appendChild(newDiv);
    // *************************************
    var newInput = document.createElement("input");
    newInput.setAttribute("type", "text");
    newInput.setAttribute("name", "text");
    newInput.setAttribute("class", "repText");
    // ********************************
    var newCheck = document.createElement("input");
    newCheck.setAttribute("type", "checkbox");
    newCheck.setAttribute("name", "checkbox");
    newCheck.setAttribute("class", "repCheck ");
    // **********************************
    var newRadio = document.createElement("input");
    newRadio.setAttribute("type", "radio");
    newRadio.setAttribute("name", "radio");
    newRadio.setAttribute("class", "repRadio");
    // **************************************
    var img = document.createElement("img");
    img.setAttribute("src", image);
    img.setAttribute("class", "ajout");
    // **************************

    newDiv.appendChild(newInput);
    var question = typeQuestion.value;
    switch (question) {
        case "1":
            // newDiv.appendChild(newInput);
            newDiv.appendChild(newCheck);
            break;
        case "2":
            // newDiv.appendChild(newInput);
            newDiv.appendChild(newRadio);
            break;
    }
    newDiv.appendChild(img);
    img.onclick = function() {
        // alert("okkkkk")
        newDiv.parentElement.removeChild(newDiv);
    }
};


// ******************************SUPPRIMER*********************
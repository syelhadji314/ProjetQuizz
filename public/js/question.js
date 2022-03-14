const typeQuestion = document.getElementById("typeQuestion");
const typeRep = document.getElementById("typeRep");
const reponse = document.getElementById("reponse");
const supprime = document.getElementById("supprime");
const reponseFinal = document.getElementById("reponseFinal");
const repCheck = document.getElementById("repCheck");
const repText = document.getElementById("repText");
var label = document.createElement("label");
const image = "/img/icones/ic-supprimer.png";
var numRep = 1;

// **************************AJOUTER***********************************
typeRep.onclick = function() {
    var newDiv = document.createElement("div");
    newDiv.setAttribute("class", "reponse");
    // newDiv.setAttribute("", "reponse");
    newDiv.appendChild(label);
    reponseFinal.appendChild(newDiv);
    // *************************************
    label.innerHTML = `Reponse ${numRep} `;


    var newInput = document.createElement("input");
    newInput.setAttribute("type", "text");
    newInput.setAttribute("name", "text[]");
    newInput.setAttribute("id", "repText_") + numRep;
    // ************************************
    label.innerHTML = `Reponse ${numRep} `;
    var newInput1 = document.createElement("input");

    newInput1.setAttribute("type", "text");
    newInput1.setAttribute("name", "text1[]");
    newInput1.setAttribute("id", "repText1_") + numRep;

    newInput.addEventListener("input", () => {
        newCheck.value = newInput.value
    })
    newInput1.addEventListener("input", () => {
        newRadio.value = newInput1.value
    })

    // ********************************
    var newCheck = document.createElement("input");
    newCheck.setAttribute("type", "checkbox");
    newCheck.setAttribute("name", "rep[]");
    newCheck.setAttribute("class", "repCheck");
    newCheck.setAttribute("id", "repCheck_") + numRep;
    newCheck.value = "repCheck_";



    // **********************************
    var newRadio = document.createElement("input");
    newRadio.setAttribute("type", "radio");
    newRadio.setAttribute("name", "rep[]");
    newRadio.setAttribute("id", "repRadio_") + numRep;
    newRadio.setAttribute("value", "") + numRep;



    // **************************************
    var img = document.createElement("img");
    img.setAttribute("src", image);
    img.setAttribute("class", "ajout");
    // **************************
    newDiv.appendChild(newInput);
    var question = typeQuestion.value;
    switch (question) {
        case "typeMultiple":
            // newDiv.appendChild(newInput);



            newDiv.appendChild(newCheck);
            break;

        case "typeSimple":
            // newDiv.appendChild(newInput);


            newDiv.appendChild(newRadio);
            break;
    }

    newDiv.appendChild(img);
    img.onclick = function() {
        // alert("okkkkk")
        newDiv.parentElement.removeChild(newDiv);
    }
    typeQuestion.addEventListener("change", () => {
        newDiv.innerHTML = "";
        numRep = 1;
    })
    numRep++;


};


// ******************************SUPPRIMER*********************
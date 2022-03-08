const TabQuestion = [{
        question: "Quel est meilleur language de programmation en 2022",
        a: "Java",
        b: "C",
        c: "Python",
        d: "javascrpt",
        // Reponse correcte
        correct: "a",

    },
    // **********************************************************************
    {
        question: "Qui est le premier president du sénégal",
        a: "Macky Sall",
        b: "Abdou Diouf",
        c: "Leopol  senghor",
        d: "Abdoulaye Wade",
        correct: "a",

    },
    // *************************************************************************
    {
        question: "Qui est Sadio mané ",
        a: "Footballeur",
        b: "Chanteur",
        c: "Cultivateur",
        d: "informaticein",
        correct: "a",

    }

];


// **************************************************************

const quiz = document.getElementById('quiz')
const reponses = document.querySelectorAll('.reponse')
const questions = document.getElementById('question')


const reponse_a = document.getElementById('reponse_a')
const reponse_b = document.getElementById('reponse_b')
const reponse_c = document.getElementById('reponse_c')
const reponse_d = document.getElementById('reponse_d')
const btnSubmit = document.getElementById('submit')




//*************************************************** */
let reponseCorrect = 0
let scort = 0
    //Chargement Question
loadQuiz()

function loadQuiz() {
    deselectReponses()
    const tableauReponse = TabQuestion[reponseCorrect]


    questions.innerText = tableauReponse.question
    reponse_a.innerText = tableauReponse.a
    reponse_b.innerText = tableauReponse.b
    reponse_c.innerText = tableauReponse.c
    reponse_d.innerText = tableauReponse.d

}
// ***************************************************************

function deselectReponses() {
    reponses.forEach(reponse => reponse.checked = false);

}


// ****************************************************************
function getSelect() {
    // console.log('hello');

    let reponse
    reponses.forEach(maReponse => {
        if (maReponse.checked) {

            reponse = maReponse.id

        }

    })

    return reponse;
}


btnSubmit.addEventListener('click', () => {
    const reponse = getSelect()
    if (reponse) {
        // *******************************************
        if (reponse === TabQuestion[reponseCorrect].correct) {
            scort++
        }
        reponseCorrect++
        if (reponseCorrect < TabQuestion.length) {
            loadQuiz()

        } else {

            quiz.innerHTML = `
        <h2>you response ${scort}/${TabQuestion.length} questions correctes .</h2>


        <button onclick="location.reload()">Rejouer</button>
        `
        }

    }

})


// console.log(btnSubmit);
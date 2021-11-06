/* global axios */

const checkbox = document.querySelectorAll("input");
let completed = document.getElementById("completed-tasks");
let incompleted = document.getElementById("incomplete-tasks");
const boutonsDesc = document.querySelectorAll("button");
const btnclose = document.querySelectorAll(".btnClose")
let description = document.querySelectorAll("div");

checkbox.forEach(e => {
  e.addEventListener('change', function() {
    let test = e.parentNode;
    if (this.checked) {
      e.parentNode.className = "checked";
      test.className = "delivred li";
      completed.appendChild(test);
      axios({
        method: 'post',
        url: '/coop/' + e.id,
        data: null
    })
    .then(function (reponse) {
        console.log(reponse);
    })
    .catch(function (erreur) {
        console.log(erreur);
    });
    }
    else {
      console.log("Checkbox is not checked..");
      e.parentNode.className = "notchecked";
      incompleted.appendChild(test);
    } 
  });
})

btnclose.forEach(btnc =>{
  btnc.addEventListener('click',closeModal);
})

boutonsDesc.forEach(btnDesc => {
  btnDesc.addEventListener('click',openModal);
})

description.forEach(pop =>{
  description.innerHTML = pop.parentNode.className;
})

function closeModal(e) {
  let id = e.currentTarget.parentNode.parentNode.id;
  const popup = document.getElementById(id+"des");
  popup.style.display='none';
}

function openModal(e) {
  let id = e.currentTarget.parentNode.id;
  const popup = document.getElementById(id+"des");
  popup.style.display = "block";
}
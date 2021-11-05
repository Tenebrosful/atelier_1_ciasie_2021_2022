const checkbox = document.querySelectorAll("input");
var completed = document.getElementById("completed-tasks");
var incompleted = document.getElementById("incomplete-tasks");
const boutons = document.querySelectorAll("button");
const btnclose = document.querySelectorAll(".btnClose")
var description = document.querySelectorAll("div");


checkbox.forEach(e => {
  e.addEventListener('change', function() {
    var test = e.parentNode;
    if (this.checked) {
      e.parentNode.className = "checked";
      test.className = "delivred";
      completed.appendChild(test);
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

boutons.forEach(btn => {
  btn.addEventListener('click',openModal);
})

description.forEach(pop =>{
  description.innerHTML = pop.parentNode.className;
})

function closeModal() {
  var id = btnc.parentNode.parentNode.id;
  const popup = document.getElementById(id+"des");
  popup.style.display='none';
}

function openModal() {
  var id = btn.parentNode.id;
  const popup = document.getElementById(id+"des");
  popup.style.display = "block";
}
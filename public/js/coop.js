const checkbox = document.querySelectorAll("input");
var completed = document.getElementById("completed-tasks");
var incompleted = document.getElementById("incomplete-tasks");
const boutonsDesc = document.querySelectorAll("button");
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

boutonsDesc.forEach(btnDesc => {
  btnDesc.addEventListener('click',openModal);
})

description.forEach(pop =>{
  description.innerHTML = pop.parentNode.className;
})

function closeModal(e) {
  var id = e.currentTarget.parentNode.parentNode.id;
  const popup = document.getElementById(id+"des");
  popup.style.display='none';
}

function openModal(e) {
  var id = e.currentTarget.parentNode.id;
  const popup = document.getElementById(id+"des");
  popup.style.display = "block";
}
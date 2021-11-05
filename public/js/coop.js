const checkbox = document.querySelectorAll("input");
var completed = document.getElementById("completed-tasks");
var incompleted = document.getElementById("incomplete-tasks");

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
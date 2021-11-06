
const button = document.getElementById("btnValidate");
button.onclick = function(event) {
  event.preventDefault();
  this.style.backgroundColor = '#15542f';
  let target = document.getElementById('form_client');
  target.style.height = "500px";
}

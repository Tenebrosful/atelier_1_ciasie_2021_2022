const button_prod = document.getElementById("button_prod");
const button_gerant = document.getElementById("button_gerant");

button_prod.clicked = false;
button_gerant.clicked = false;

button_prod.onclick = function() {
  this.clicked = !this.clicked;
  let target = document.getElementById('form_prod');
  if (this.clicked) {
    if (button_gerant.clicked) 
      button_gerant.click();
        
    this.style.backgroundColor = '#f42400';
    this.style.color = '#e5e5e5';    
    target.style.height = target.scrollHeight+"px";
  }
  else{ 
    this.style.backgroundColor = '#ff4b2b';
    this.style.color = 'white';
    target.style.height = 0;
  }  
}

button_gerant.onclick = function() {
  this.clicked = !this.clicked;
  let target = document.getElementById('form_gerant');
  if (this.clicked) {
    if (button_prod.clicked) 
      button_prod.click();
        
    this.style.backgroundColor = '#f42400';
    this.style.color = '#e5e5e5';    
    target.style.height = target.scrollHeight+"px";
  }
  else{
    this.style.backgroundColor = '#ff4b2b';
    this.style.color = 'white';  
    target.style.height = 0;
  }   
}

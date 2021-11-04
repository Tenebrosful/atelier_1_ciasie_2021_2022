but1 = document.getElementById("button_prod");
but2 = document.getElementById("button_gerant");
but1.clicked = false;
but2.clicked = false;

but1.onclick = function() {
   this.clicked = !this.clicked;
   let target = document.getElementById('hidden1');
    if (this.clicked) {
        if (but2.clicked) {
            but2.click();
        }
        target.style.height = target.scrollHeight+"px";
    }
    else {
        target.style.height = 0;
    }
}

but2.onclick = function() {
    this.clicked = !this.clicked;
    let target = document.getElementById('hidden2');
     if (this.clicked) {
        if (but1.clicked) {
            but1.click();
        }
         target.style.height = target.scrollHeight+"px";
     }
     else {
         target.style.height = 0;
     }
 }
function plus(input) {
    input.value = parseInt(input.value) + 1
}

function minus(input) {
    input.value = Math.max(parseInt(input.value) - 1, 0)
}

but1 = document.getElementById("button_prod");
but2 = document.getElementById("button_gerant");
but1.clicked = false;
but2.clicked = false;

but1.onclick = function () {
    this.clicked = !this.clicked;
    let target = document.getElementById('hidden1');
    if (this.clicked) {
        if (but2.clicked) {
            but2.click();
        }
        this.style.backgroundColor = '#f42400';
        this.style.color = '#e5e5e5';
        target.style.height = target.scrollHeight + "px";
    }
    else {
        this.style.backgroundColor = '#ff4b2b';
        this.style.color = 'white';
        target.style.height = 0;
    }
}

but2.onclick = function () {
    this.clicked = !this.clicked;
    let target = document.getElementById('hidden2');
    if (this.clicked) {
        if (but1.clicked) {
            but1.click();
        }
        this.style.backgroundColor = '#f42400';
        this.style.color = '#e5e5e5';
        target.style.height = target.scrollHeight + "px";
    }
    else {
        this.style.backgroundColor = '#ff4b2b';
        this.style.color = 'white';
        target.style.height = 0;
    }
}
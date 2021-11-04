const checkbox = document.querySelectorAll("input");

checkbox.forEach(e => {
	e.addEventListener('change', function() {
		if (this.checked) {
			console.log("Checkbox is checked..");
		}
		else {
			console.log("Checkbox is not checked..");
		}
	  });
})
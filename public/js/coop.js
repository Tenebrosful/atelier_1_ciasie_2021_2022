var checkbox = document.querySelectorAll("input");

for (let pas = 0; pas < checkbox.length; pas++) {
checkbox[pas].addEventListener('change', function() {
	if (this.checked) {
	  console.log("Checkbox is checked..");
	} else {
	  console.log("Checkbox is not checked..");
	}
  });
}
let categories = document.getElementsByName("categorie")
console.log(categories)
  categories.forEach(element => {
    element.addEventListener("change",function(){
        getProduct()
    })
  })

function getProduct(){
  let listCateg = Array()
  categories.forEach(element => {
      if(element.checked == true){
        listCateg.push(element.value)
      }
  })
}

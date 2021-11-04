let categories = document.getElementsByName("categorie")
console.log(categories)
categories.forEach(element => {
  element.addEventListener("change",function(){
    getProduct()
  })
})

function getProduct(){
  let listCateg = []
  categories.forEach(element => {
    if(element.checked)
      listCateg.push(element.value)
      
  })
}

let categories = document.getElementsByName("categorie")
categories.forEach(element => {
  element.addEventListener("change",function(){
    getProduct()
  })
})

async function getProduct(){
  let listCateg = []
  categories.forEach(element => {
    if(element.checked)
      listCateg.push(element.value)

  })
}

axios.get('/products/')
  .then(function (response) {
    console.log(JSON.parse(response.data))
  })

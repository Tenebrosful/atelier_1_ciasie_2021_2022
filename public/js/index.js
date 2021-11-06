/*global axios*/

let categories = document.getElementsByName("categorie")
let filter = document.getElementById("filter")

async function getProduct(){
  let listCateg = []
  categories.forEach(element => {
    if(element.checked){
      listCateg.push(element.value)
    }
  })
  axios.get('/products?categ='+listCateg,)
    .then(function (response) {
      //let products = JSON.parse(response)
      let data = JSON.parse(response.data)
      let container = document.getElementById("container")
      let container_inner = ""
      data.forEach((element, i) => {
        container_inner +=
          `<div class='span'>
            <a class='base_link' href=`+element.id+`>
            <img class='span-img' src=`+element.url_img+` alt=''>
            <h3>`+element.name+`</h3>
            <p>`+element.amount_unit+`€ / `+element.unit+`</p>
            </a>
            <div class='add'>
              <div class='mb-2'>
                <div class='inline-flex'>
                  <button title='Ajouter une quantité'' aria-label='Ajouter une quantité' type='button' class='btn__qte'
                    onclick='minus(qnt_article_`+i+`)'><i class='fas fa-minus'></i></button>
                  <div class='form__div mb-3'>
                    <input type='number' min='0' name='input' class='form__input' id='qnt_article_`+i+`' value='0'>
                  </div>
                  <button title='Retirer une quantité' aria-label='Retirer une quantité' type='button' class='btn__qte'
                    onclick='plus(qnt_article_`+i+`)'><i class='fas fa-plus'></i></button>
                </div>
                <br>
              </div>
              <a href='#' class='btn' onclick='add(input`+i+`)'>Ajouter au panier</a>
            </div>
          </div>
          `
      });
      container.innerHTML = container_inner

    })

}

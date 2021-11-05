/*global axios*/

function getProducers(number){
  let page = document.getElementById("page")
  if(page.value !== 1 || number !== -1){
    let nbpage = parseInt(page.value)+ parseInt(number)
    page.value = nbpage
    axios.get('/producers?page='+nbpage ,)
      .then(function (response) {
        //let products = JSON.parse(response)
        let data = JSON.parse(response.data)
        let container = document.getElementById("producersContainer")
        let container_inner = ""
        data.forEach((element, i) => {
          container_inner +=
            `<tr>
              <td class="p-1 pl-3"><img src="`+element.url_img+`" alt=""></td>
              <td>`+element.name+`</td>
              <td>`+element.description+`</td>
              <td><a href="#">`+element.email+`</a></td>
              <td><a href="/producer/`+element.id+`">à propos</a></td>
            </tr>
            `
        });
        container.innerHTML = container_inner
        document.getElementById("pageText").innerText = "page "+nbpage
      })
  }
}

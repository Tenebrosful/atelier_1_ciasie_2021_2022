
function plus(input){
  input.value = Math.min(parseInt(input.value) + 1, input.max || Number.MAX_VALUE)
}

function minus(input){
  input.value = Math.max(parseInt(input.value) - 1, input.min || -Number.MAX_VALUE)
}
function plus(input){
    input.value = parseInt(input.value) + 1
}

function minus(input){
    input.value = Math.max(parseInt(input.value) - 1, 0)
}
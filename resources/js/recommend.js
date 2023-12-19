let del = Array.from(document.querySelectorAll(".button-delete"))
console.log(del)

let prompt = document.querySelector('.prompt-box-down')
del.forEach(element => {
    element.addEventListener("click", delcheck)
})

function delcheck () {
    console.log("text")
    prompt.style.display = 'flex'
}

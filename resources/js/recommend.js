let del = Array.from(document.querySelectorAll(".button-delete"))
console.log(del)

let prompt = document.querySelector('.prompt-box-down')

console.log(prompt)
del.forEach(element => {
    element.addEventListener("click", delcheck)
})

let cancel = document.querySelector(".cancel")
cancel.addEventListener("click", msgClose)

let confirm = document.querySelector(".confirm")

confirm.addEventListener("click", Sendmsg)


let delTarget = 0
function delcheck () {
    console.log(this.dataset.key)
    delTarget = this.dataset.key
    prompt.style.display = 'flex'


}
function msgClose () {

    console.log("text")
    prompt.style.display = 'none'
}
function Sendmsg () {
    console.log(this)
    let myForm = document.getElementById("delete-form")
    console.log(delTarget)
    myForm.action = delTarget

    console.log(myForm)
    myForm.submit()
    // prompt.style.display = 'none'
}

let store = Array.from(document.querySelectorAll(".button-store"))
let cname = Array.from(document.querySelectorAll(".name"))
let clink = Array.from(document.querySelectorAll(".link"))
let cisup = Array.from(document.querySelectorAll(".isup"))

// let prompt = document.querySelector('.prompt-box-down')

for (let i = 0; i < store.length; i++) {
    cname[i].addEventListener("input", function () {
        store[i].style.color = "red"
    })
    clink[i].addEventListener("input", function () {
        store[i].style.color = "red"
    })
    cisup[i].addEventListener("input", function () {
        store[i].style.color = "red"
    })
}



// console.log(prompt)
// del.forEach(element => {
//     element.addEventListener("click", delcheck)
// })

// let cnacel = document.querySelector(".cancel")
// cancel.addEventListener("click", msgClose)

// let confirm = document.querySelector(".confirm")

// confirm.addEventListener("click", Sendmsg)


// let delTarget = 0
// function delcheck () {
//     console.log(this.dataset.key)
//     delTarget = this.dataset.key
//     prompt.style.display = 'flex'


// }
// function msgClose () {

//     console.log("text")
//     prompt.style.display = 'none'
// }
// function Sendmsg () {
//     console.log(this)
//     let myForm = document.getElementById("delete-form")
//     console.log(delTarget)
//     myForm.action = delTarget

//     console.log(myForm)
//     myForm.submit()
//     // prompt.style.display = 'none'
// }

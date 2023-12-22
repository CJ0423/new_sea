var input_all = document.querySelector('.input-all') //全部
var input_down = document.querySelector('.input-down') //下架

var banner_superior = document.querySelectorAll('.banner-superior') //已上架
var banner_down = document.querySelectorAll('.banner-down') //已下架
var banner_prepare = document.querySelectorAll('.banner-prepare') //未上架


input_all.onclick = function () {
    input_all.style.color = "#6ebe49"
    input_down.style.color = "#000"

    banner_superior.forEach((element) => { element.style.display = "" })
    banner_down.forEach((element) => { element.style.display = "" })
    banner_prepare.forEach((element) => { element.style.display = "" })
}
input_down.onclick = function () {
    input_all.style.color = "#000"
    input_down.style.color = "#6ebe49"

    banner_superior.forEach((element) => { element.style.display = "none" })
    banner_down.forEach((element) => { element.style.display = "" })
    banner_prepare.forEach((element) => { element.style.display = "none" })
}




// let down = Array.from(document.querySelectorAll(".button-down")) //下架
// console.log(down)
// let prompt_down = document.querySelector('.prompt-box-down') //下架提示框
// console.log(prompt_down)

let del = Array.from(document.querySelectorAll(".button-delete")) //刪除
console.log(del)
let prompt_del = document.querySelector('.prompt-box-delete') //刪除提示框
console.log(prompt_del)

del.forEach(element => {
    element.addEventListener("click", delcheck)
})

let cancel_del = document.querySelector(".cancel-delete")
cancel_del.addEventListener("click", msgClose)

let confirm_del = document.querySelector(".confirm-delete")

confirm_del.addEventListener("click", Sendmsg)

let delTarget = 0
function delcheck () {
    console.log(this.dataset.key)
    delTarget = this.dataset.key
    prompt_del.style.display = 'flex'
}
function msgClose () {

    console.log("text")
    prompt_del.style.display = 'none'
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


let down = Array.from(document.querySelectorAll(".button-down")) //下架
console.log(down)
let prompt_down = document.querySelector('.prompt-box-down') //刪除提示框
console.log(prompt_del)

del.forEach(element => {
    element.addEventListener("click", delcheck)
})

let cancel_del = document.querySelector(".button-down")
cancel_del.addEventListener("click", msgClose)

let confirm_del = document.querySelector(".confirm-delete")

confirm_del.addEventListener("click", Sendmsg)

let delTarget = 0
function delcheck () {
    console.log(this.dataset.key)
    delTarget = this.dataset.key
    prompt_del.style.display = 'flex'
}
function msgClose () {

    console.log("text")
    prompt_del.style.display = 'none'
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

//更新版

var down = document.querySelectorAll('.button-down') //下架
var box_down = document.querySelector('.prompt-box-down') //下架提示
var confirm = document.querySelector('.confirm') //確認
var cancel = document.querySelector('.cancel') //取消

let downTarget = 0
down.onclick = function () {
    console.log(this)
    console.log(this.dataset.key)
    box_down.style.display = "flex"
    downTarget = this.dataset.key
}
confirm.onclick = function () {
    let myForm = document.querySelector(".my-form")
    myForm.action = downTarget

    console.log(myForm)
    myForm.submit()

    box_down.style.display = "none"
}
cancel.onclick = function () {
    box_down.style.display = "none"
}

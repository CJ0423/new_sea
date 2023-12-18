let del = document.querySelector(".del")
let cancel = document.querySelector(".cancel")

let promptBoxDown = document.querySelector(".prompt-box-down")
console.log(del)
del.addEventListener("click", masbox)
cancel.addEventListener("click", masboxClose)
function masbox () {
    promptBoxDown.style.display = "block"

}
function masboxClose () {
    promptBoxDown.style.display = "none"
}

let centerBtn = document.querySelector(".center")
centerBtn.addEventListener("click", send)

function send () {

}

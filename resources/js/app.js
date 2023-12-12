import './bootstrap'

import Alpine from 'alpinejs'
import '../css/app.scss'//引入scss


window.Alpine = Alpine

Alpine.start()
function getDom (DOM) {
    return document.querySelector(`${DOM}`)
}
function msgbox () {
    console.log(msgBox)
    msgBox.style.display = "block"
}
function closeMassageBox () {
    msgBox.style.display = "none"
}


let forgetButton = getDom(".forget-password")
console.log(forgetButton)
let msgBox = getDom("#msg-box")
console.log(msgBox)
let centerBtn = getDom("#center-btn")

forgetButton.addEventListener("click", msgbox)

centerBtn.addEventListener("click", closeMassageBox)

let clearBtns = document.querySelectorAll(".clear-btn")

let videos = document.querySelectorAll('video')

clearBtns.forEach(element => {
    element.addEventListener("click", repeatAgain)

})

function repeatAgain () {
    console.log("text")
}

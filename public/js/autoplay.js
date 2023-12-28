let clearBtns = document.querySelectorAll(".clear-btn")

let videos = document.querySelectorAll('video')

clearBtns.forEach(element => {
    element.addEventListener("click", repeatAgain)

})

function repeatAgain () {
    videos.forEach(element => {
        console.log(element)
        element.currentTime = 0
    })

}

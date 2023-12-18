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

    var now = new Date()
    var year = now.getFullYear()
    var month = now.getMonth() + 1 // getMonth() 返回 0-11
    var day = now.getDate()
    var hour = now.getHours()
    var minute = now.getMinutes()

    // 格式化月份、日期、小时和分钟为两位数
    month = month < 10 ? '0' + month : month
    day = day < 10 ? '0' + day : day
    hour = hour < 10 ? '0' + hour : hour
    minute = minute < 10 ? '0' + minute : minute

    var formattedDateTime = year + '-' + month + '-' + day + ' ' + hour + ':' + minute + ':00'
    document.getElementById("end-time-input").value = formattedDateTime

    document.getElementById('send').submit()

}

// 補上js去禁用
let hideTd = document.querySelectorAll(".area")
let upTime = document.querySelectorAll(".up-time")
console.log(upTime)

upTime[0].addEventListener("change", checkEndTime)
upTime[1].addEventListener("change", checkEndTime)
console.log(upTime[0])
function checkEndTime () {
    let startTime = new Date('1970/01/01 ' + upTime[0].value)
    let endTime = new Date('1970/01/01 ' + upTime[1].value)

    if (startTime > endTime) {
        console.error('結束時間不能早於開始時間。')
        upTime[1].value = '' // 清空結束時間
        // 可以選擇顯示錯誤訊息給用戶
    }
}

hideTd.forEach(element => {
    let style = window.getComputedStyle(element)
    // console.log(style.display)
    if (style.display == "none") {
        // console.log(element)
        let selects = element.querySelectorAll('select')
        // 禁用所有找到的 select 標籤
        selects.forEach(select => {
            select.disabled = true
        })
    }
})

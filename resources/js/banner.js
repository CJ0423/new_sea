var all = document.querySelector('.input-all'); //全部
var down = document.querySelector('.input-down'); //下架

var banner_superior = document.querySelectorAll('.banner-superior'); //已上架
var banner_down = document.querySelectorAll('.banner-down'); //已下架
var banner_prepare = document.querySelectorAll('.banner-prepare'); //未上架


all.onclick = function () {
    all.style.color = "#6ebe49";
    down.style.color = "#000";

    banner_superior.forEach((element) => {element.style.display = ""});
    banner_down.forEach((element) => {element.style.display = ""});
    banner_prepare.forEach((element) => {element.style.display = ""});
}
down.onclick = function () {
    all.style.color = "#000";
    down.style.color = "#6ebe49";

    banner_superior.forEach((element) => {element.style.display = "none"});
    banner_down.forEach((element) => {element.style.display = ""});
    banner_prepare.forEach((element) => {element.style.display = "none"});
}

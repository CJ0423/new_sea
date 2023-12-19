// Get the dropdown button and content
const dropBtn = document.querySelector('.dropdown')
const dropdownContent = document.querySelector('.dropdown-content')

// Toggle the dropdown on click
dropBtn.onclick = function () {
    dropdownContent.classList.toggle('dropdown-active')
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
        if (dropdownContent.classList.contains('dropdown-active')) {
            dropdownContent.classList.remove('dropdown-active')
        }
    }
}


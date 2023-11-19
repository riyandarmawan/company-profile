// navigation menu start
const hamnburgerMenu = document.querySelector('.hamburger-menu');
const navigation = document.querySelector('.navigation');

hamnburgerMenu.onclick = () => {
    navigation.classList.toggle('show');
}

document.addEventListener('click', (e) => {
    if (!hamnburgerMenu.contains(e.target) && !navigation.contains(e.target)) {
        navigation.classList.remove('show')
    }
})

// dropdown menu start 
const dropdownToggle = document.querySelector('.dropdown-toggle');
const dropdownMenu = document.querySelector('.dropdown-menu');

dropdownToggle.onclick = () => {
    dropdownMenu.classList.toggle('show');
}

document.addEventListener('click', (e) => {
    if(!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.classList.remove('show')
    }
})
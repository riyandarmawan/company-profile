// navigation menu start
const hamnburgerMenu = document.querySelector(".hamburger-menu");
const navigation = document.querySelector(".navigation");

hamnburgerMenu.onclick = () => {
    navigation.classList.toggle("show");
};

document.addEventListener("click", (e) => {
    if (!hamnburgerMenu.contains(e.target) && !navigation.contains(e.target)) {
        navigation.classList.remove("show");
    }
});

// dropdown menu start
const dropdownToggle = document.querySelector(".dropdown-toggle");
const dropdownMenu = document.querySelector(".dropdown-menu");

dropdownToggle.onclick = () => {
    dropdownMenu.classList.toggle("show");
};

document.addEventListener("click", (e) => {
    if (
        !dropdownToggle.contains(e.target) &&
        !dropdownMenu.contains(e.target)
    ) {
        dropdownMenu.classList.remove("show");
    }
});

// news page start('latest-news')
const latestNews1 = document.getElementById("latest-news-1");
const latestNews2 = document.getElementById("latest-news-2");
const latestNews3 = document.getElementById("latest-news-3");

function newsLoop() {
    setTimeout(() => {
        latestNews1.classList.remove("active");
        latestNews2.classList.add("active");
        latestNews1.classList.add("no-active");
    }, 3000);

    setTimeout(() => {
        latestNews1.classList.remove("no-active");
    }, 3500);

    setTimeout(() => {
        latestNews2.classList.remove("active");
        latestNews3.classList.add("active");
        latestNews2.classList.add("no-active");
    }, 6000);

    setTimeout(() => {
        latestNews2.classList.remove("no-active");
    }, 6500);

    setTimeout(() => {
        latestNews3.classList.remove("active");
        latestNews1.classList.add("active");
        latestNews3.classList.add("no-active");
    }, 9000);

    setTimeout(() => {
        latestNews3.classList.remove("no-active");
    }, 9500);
}

newsLoop()
setInterval(newsLoop, 9500);
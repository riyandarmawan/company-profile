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

const indicatorNews1 = document.getElementById("indicator-news-1");
const indicatorNews2 = document.getElementById("indicator-news-2");
const indicatorNews3 = document.getElementById("indicator-news-3");

const previous = document.getElementById("previous");
const next = document.getElementById("next");

latestNews1.classList.add('active');

function indicatorNews() {
    if (latestNews1.classList.contains("active")) {
        indicatorNews1.classList.add("active");
        indicatorNews3.classList.remove("active");
        indicatorNews2.classList.remove("active");
    } else if (latestNews2.classList.contains("active")) {
        indicatorNews2.classList.add("active");
        indicatorNews1.classList.remove("active");
        indicatorNews3.classList.remove("active");
    } else if (latestNews3.classList.contains("active")) {
        indicatorNews3.classList.add("active");
        indicatorNews2.classList.remove("active");
        indicatorNews1.classList.remove("active");
    }
}

setInterval(indicatorNews, 100);

function newsLoop() {
    if (latestNews1.classList.contains("active")) {
        latestNews1.classList.replace("active", "no-active");
        latestNews2.classList.add("active");
    } else if (latestNews2.classList.contains("active")) {
        latestNews2.classList.replace("active", "no-active");
        latestNews3.classList.add("active");
    } else if (latestNews3.classList.contains("active")) {
        latestNews3.classList.replace("active", "no-active");
        latestNews1.classList.add("active");
    }

    setTimeout(() => {
        if (latestNews1.classList.contains("no-active")) {
            latestNews1.classList.remove("no-active");
        } else if (latestNews2.classList.contains("no-active")) {
            latestNews2.classList.remove("no-active");
        } else if (latestNews3.classList.contains("no-active")) {
            latestNews3.classList.remove("no-active");
        }
    }, 500);

    indicatorNews();
}

let intervalId = setInterval(newsLoop, 3000);

previous.onclick = () => {
    clearInterval(intervalId);
    
    if (latestNews1.classList.contains("active")) {
        latestNews3.classList.add("no-active");
        setTimeout(() => {
            latestNews1.classList.remove("active");
            latestNews3.classList.replace("no-active", "active");
        }, 500);
    }
    if (latestNews2.classList.contains("active")) {
        latestNews1.classList.add("no-active");
        setTimeout(() => {
            latestNews2.classList.remove("active");
            latestNews1.classList.replace("no-active", "active");
        }, 500);
    }
    if (latestNews3.classList.contains("active")) {
        latestNews2.classList.add("no-active");
        setTimeout(() => {
            latestNews3.classList.remove("active");
            latestNews2.classList.replace("no-active", "active");
        }, 500);
    }

    intervalId = setInterval(newsLoop, 3000);
};

next.onclick = () => {
    clearInterval(intervalId);

    if (latestNews1.classList.contains("active")) {
        latestNews1.classList.replace("active", "no-active");
        latestNews2.classList.add("active");
        setTimeout(() => {
            latestNews1.classList.remove("no-active");
        }, 500);
    } else if (latestNews2.classList.contains("active")) {
        latestNews2.classList.replace("active", "no-active");
        latestNews3.classList.add("active");
        setTimeout(() => {
            latestNews2.classList.remove("no-active");
        }, 500);
    } else if (latestNews3.classList.contains("active")) {
        latestNews3.classList.replace("active", "no-active");
        latestNews1.classList.add("active");
        setTimeout(() => {
            latestNews3.classList.remove("no-active");
        }, 500);
    }

    intervalId = setInterval(newsLoop, 3000);
};
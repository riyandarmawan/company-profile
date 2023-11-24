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
const latestNews = ["latest-news-1", "latest-news-2", "latest-news-3"].map(
    (id) => document.getElementById(id)
);
const indicatorNews = [
    "indicator-news-1",
    "indicator-news-2",
    "indicator-news-3",
].map((id) => document.getElementById(id));

let activeIndex = 0;

function updateIndicators() {
    latestNews.forEach((news, index) => {
        if (index === activeIndex) {
            indicatorNews[index].classList.add("active");
        } else {
            indicatorNews[index].classList.remove("active");
        }
    });
}

function newsLoop() {
    latestNews[activeIndex].classList.replace("active", "no-active");
    activeIndex = (activeIndex + 1) % latestNews.length;
    latestNews[activeIndex].classList.add("active");

    setTimeout(() => {
        latestNews.forEach((news, index) => {
            if (index !== activeIndex && news.classList.contains("no-active")) {
                news.classList.remove("no-active");
            }
        });
    }, 500);

    updateIndicators();
}

let intervalId = setInterval(newsLoop, 3000);

let isButtonDisabled = false;

previous.onclick = () => {
    if (isButtonDisabled) return;
    isButtonDisabled = true;
    setTimeout(() => (isButtonDisabled = false), 700);

    clearInterval(intervalId);

    let beforeIndex = activeIndex;

    activeIndex = (activeIndex - 1 + latestNews.length) % latestNews.length;
    latestNews[activeIndex].classList.add("no-active");
    setTimeout(() => {
        latestNews[beforeIndex].classList.remove("active");
        latestNews[activeIndex].classList.replace("no-active", "active");
        updateIndicators();
    }, 400);


    setTimeout(() => {
        latestNews.forEach((news, index) => {
            if (index !== activeIndex && news.classList.contains("no-active")) {
                news.classList.remove("no-active");
            }
        });
    }, 500);

    intervalId = setInterval(newsLoop, 3000);
};

next.onclick = () => {
    if (isButtonDisabled) return;
    isButtonDisabled = true;
    setTimeout(() => (isButtonDisabled = false), 1000);

    clearInterval(intervalId);
    newsLoop();
    updateIndicators();
    intervalId = setInterval(newsLoop, 3000);
};

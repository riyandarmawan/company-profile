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
const flow = document.querySelector(".flow");

const indicatorNews1 = document.querySelector("#indicator-news-1");
const indicatorNews2 = document.querySelector("#indicator-news-2");
const indicatorNews3 = document.querySelector("#indicator-news-3");

const previous = document.querySelector("#previous");
const next = document.querySelector("#next");

function updateIndicator() {
    if (flow.classList.contains("page-1")) {
        indicatorNews3.classList.remove("active");
        indicatorNews2.classList.remove("active");
        indicatorNews1.classList.add("active");
        previous.classList.add("end-previous");
        next.classList.remove("end-next");
    } else if (flow.classList.contains("page-2")) {
        indicatorNews3.classList.remove("active");
        indicatorNews1.classList.remove("active");
        indicatorNews2.classList.add("active");
        previous.classList.remove("end-previous");
        next.classList.remove("end-next");
    } else if (flow.classList.contains("page-3")) {
        indicatorNews1.classList.remove("active");
        indicatorNews2.classList.remove("active");
        indicatorNews3.classList.add("active");
        next.classList.add("end-next");
    }
}

function newsLoop() {
    if (flow.classList.contains("page-1")) {
        flow.classList.replace("page-1", "page-2");
    } else if (flow.classList.contains("page-2")) {
        flow.classList.replace("page-2", "page-3");
    } else if (flow.classList.contains("page-3")) {
        flow.classList.replace("page-3", "page-1");
    }

    updateIndicator();
}

let intervalId = setInterval(newsLoop, 3000);

let isButtonClicked = false;

document.addEventListener("click", (e) => {
    if (isButtonClicked) return;
    isButtonClicked = true;
    setTimeout(() => {
        isButtonClicked = false;
    }, 500);

    clearInterval(intervalId);

    if (previous.contains(e.target)) {
        if (flow.classList.contains("page-2")) {
            flow.classList.replace("page-2", "page-1");
        } else if (flow.classList.contains("page-3")) {
            flow.classList.replace("page-3", "page-2");
        }
    }

    if (next.contains(e.target)) {
        if (flow.classList.contains("page-1")) {
            flow.classList.replace("page-1", "page-2");
        } else if (flow.classList.contains("page-2")) {
            flow.classList.replace("page-2", "page-3");
        }
    }

    updateIndicator();

    intervalId = setInterval(newsLoop, 3000);
});

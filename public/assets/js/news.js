// news page start('latest-news')
const flow = document.querySelector(".flow");
const indicators = Array.from(
    document.querySelectorAll("[id^='indicator-news-']")
);
const previous = document.querySelector("#previous");
const next = document.querySelector("#next");

function updateIndicator() {
    const activePage = flow.className
        .split(" ")
        .find((className) => className.startsWith("page-"));
    const activeIndex = Number(activePage.split("-")[1]) - 1;

    indicators.forEach((indicator, index) => {
        indicator.classList.toggle("active", index === activeIndex);
    });
}

function newsLoop() {
    const activePage = flow.className
        .split(" ")
        .find((className) => className.startsWith("page-"));
    const activeIndex = Number(activePage.split("-")[1]);
    const newIndex = (activeIndex % indicators.length) + 1;

    flow.classList.replace(activePage, `page-${newIndex}`);
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

    if (previous.contains(e.target) || next.contains(e.target)) {
        clearInterval(intervalId);

        const activePage = flow.className
            .split(" ")
            .find((className) => className.startsWith("page-"));
        const activeIndex = Number(activePage.split("-")[1]);
        let newIndex;

        if (previous.contains(e.target)) {
            newIndex = activeIndex === 1 ? indicators.length : activeIndex - 1;
        } else {
            newIndex = (activeIndex % indicators.length) + 1;
        }

        flow.classList.replace(activePage, `page-${newIndex}`);
        updateIndicator();

        intervalId = setInterval(newsLoop, 3000);
    }
});
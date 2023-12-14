let newsImage = document.getElementById('news-image');
let image = document.getElementById('image');
let imageLabel = document.getElementById('image-label');
let newsText = document.querySelector('.news-text');

image.addEventListener('change', (e) => {
    let file = e.target.files[0];
    let reader = new FileReader();

    reader.onloadend = function () {
        newsText.classList.add('d-none');
        newsImage.classList.remove('d-none');
        newsImage.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    }
})
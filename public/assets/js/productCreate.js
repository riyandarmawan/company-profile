let productImage = document.getElementById('product-image');
let productImageLabel = document.getElementById('product-image-label');
let productImageInput = document.getElementById('product-image-input');
let productText = document.querySelector('.product-text');

productImageInput.addEventListener('change', (e) => {
    let file = e.target.files[0];
    let reader = new FileReader();

    reader.onloadend = function () {
        productText.classList.add('d-none');
        productImage.classList.remove('d-none');
        productImage.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    }
})
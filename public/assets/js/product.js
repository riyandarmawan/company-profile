window.addEventListener('DOMContentLoaded', (event) => {
    const grid = document.querySelector('.group.container-card');
    const cardCount = grid.querySelectorAll('.card').length;
    if (cardCount < 3) {
        grid.style.gridTemplateColumns = '23rem 23rem';
    } else {
        grid.style.gridTemplateColumns = 'repeat(auto-fit, minmax(18rem, 1fr))';
    }
});

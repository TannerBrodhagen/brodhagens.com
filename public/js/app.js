function toggleMenu() {
    const menu = document.querySelector('.menu');
    menu.classList.toggle('hidden');
    menu.classList.toggle('open');
}
function togglePhotoInfo(button) {
    const tile = button.closest('.tile');
    const photoInfo = tile.querySelector('.tile-right');
    photoInfo.classList.toggle('open');
}
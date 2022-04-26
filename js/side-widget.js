const sideWidget = document.querySelector('.social-media-bar');
const stage = document.querySelector('.stage');
const isDesktop = window.matchMedia("(min-width: 1024px)");

const stageHeight = stage.offsetHeight;


window.addEventListener('scroll', function() {
    if (window.scrollY > stageHeight) {
        sideWidget.classList.add("isFixed");
        console.log('passed');
    } else {
        sideWidget.classList.remove("isFixed");
    }
})

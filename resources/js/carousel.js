import Slider from './vanilla-slider.js';

document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('#slider')) {
        var slider = new Slider(document.querySelector('#slider'));

        // Autoplay functionality
        let autoplayInterval = setInterval(() => {
            let nextIndex = slider.state.active + 1;
            if (nextIndex >= slider.state.slidesCount) {
                nextIndex = 0;
            }
            slider.updateIndex(nextIndex);
            slider._returnToOrigin();
            slider._cssActiveClass(nextIndex);
        }, 5000);

        // Stop autoplay on touch
        slider.on('touch', () => {
            clearInterval(autoplayInterval);
        });
    }
});

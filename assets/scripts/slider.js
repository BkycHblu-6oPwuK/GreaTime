//слайдер баннер
function banner() {
    const images = document.querySelectorAll('.slider .line_slider img');
    const sliderLine = document.querySelector('.slider .line_slider');
    let count = 0;
    let width;

    function init() {
        width = document.querySelector('.slider').offsetWidth;
        images.forEach(item => {
            item.style.width = width + 'px';
            item.style.height = 'auto';
        });
        rollSlider();
        return;
    }

    init();

    document.querySelector('#next').addEventListener('click', function () {
        count++;
        if (count >= images.length) {
            count = 0;
        }
        rollSlider();
        return;
    });

    document.querySelector('#prev').addEventListener('click', function () {
        count--;
        if (count < 0) {
            count = images.length - 1;
        }
        rollSlider();
        return;
    });

    function rollSlider() {
        sliderLine.style.transform = 'translate(-' + count * width + 'px)';
        return;
    }

    let timer = 0;
    makeTimer();
    function makeTimer() {
        clearInterval(timer)
        timer = setInterval(function () {
            count++;
            if (count >= images.length) {
                count = 0;
            }
            rollSlider();
            init();
        }, 10000);
        return;
    }
};
if (document.querySelector('.slider')) {
    banner();
};

//Слайдер с карточками товаров

function slider() {
    const twoImages = document.querySelectorAll('.popular .slider_two .all_slider_two .sl_two_line .popular_tovar');
    const twoSliderLine = document.querySelector('.popular .slider_two .all_slider_two .sl_two_line');
    let twoCount = 0;

    document.querySelector('#next_slider_two').addEventListener('click', function () {
        twoCount++;
        if (twoCount >= twoImages.length - 3) {
            twoCount = 0;
        }
        twoRollSlider();
    });

    document.querySelector('#prev_slider_two').addEventListener('click', function () {
        twoCount--;
        if (twoCount < 0) {
            twoCount = twoImages.length - 4;
        }
        twoRollSlider();
    });

    function twoRollSlider() {
        twoSliderLine.style.transform = 'translate(-' + twoCount * 270 + 'px)';
    }
};
if (document.querySelector('.popular')) {
    slider();
};

//end
const btnMenuToggle = document.querySelector('.menu-toggle');
if (btnMenuToggle) {
    btnMenuToggle.addEventListener('click', () => {
        let menu = document.getElementById('main-navbar');
        if (parseInt(getComputedStyle(menu).maxHeight) > 0 ) {
            menu.style.maxHeight = '0px';
        } else {
            let ad = document.querySelector('#main-navbar > ul:first-child');;
            menu.style.maxHeight = parseInt(getComputedStyle(ad).height) + 10 + 'px';
        }
    });
}
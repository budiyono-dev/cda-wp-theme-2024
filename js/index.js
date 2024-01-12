const btnMenuToggle = document.querySelector('.menu-toggle');
const loc = document.querySelectorAll('.loc');
if (loc && loc.length>0) {
    let wraperLoc = document.getElementById('loc-bar');
    console.log(loc);
    console.log(wraperLoc);
    loc.forEach((el) => {
        console.log(el);
        let listItem = document.createElement('li');
        let anchor = document.createElement('a');
        anchor.href = `#${el.id}`;
        anchor.textContent = el.innerText;
        listItem.appendChild(anchor);
        wraperLoc.appendChild(listItem);
    });
} else {
    
}
let open = false;
if (btnMenuToggle) {
    btnMenuToggle.addEventListener('click', () => {
        let menu = document.getElementById('main-navbar');
        if (parseInt(getComputedStyle(menu).maxHeight) > 0 ) {
            menu.style.maxHeight = '0px';
        } else {
            let ad = document.querySelector('#main-navbar > ul:first-child');;
            // setTimeout(() => null, 100);
            menu.style.maxHeight = parseInt(getComputedStyle(ad).height) + 10 + 'px';
        }
    });
}
const loc = document.querySelectorAll('.loc');
if (loc && loc.length>0) {
    let wraperLoc = document.getElementById('loc-bar');
    console.log(loc);
    console.log(wraperLoc);
    loc.forEach((el) => {
        console.log(el);
        let listItem = document.createElement("li");
        let anchor = document.createElement("a");
        anchor.href = `#${el.id}`;
        anchor.textContent = el.innerText;
        listItem.appendChild(anchor);
        wraperLoc.appendChild(listItem);
    });
} else {
    
}
// Select show tab on load page
let indexOpen = 0;

let btnTab = document.querySelectorAll('.nav-tab ul li button');
let contentTab = document.querySelectorAll('.content-tab');

function tabCurrent(thisTab) {
    if (thisTab) {
        let idCurrent = thisTab.dataset.tab;
    
        for (let i = 0; i < btnTab.length; i++) {
            btnTab[i].classList.remove('tab-current');
        }
        thisTab.classList.add('tab-current');
    
        for (let i = 0; i < contentTab.length; i++) {
        if (idCurrent === contentTab[i].id) {
            contentTab[i].classList.add('current-content-tab');
        } else {
            contentTab[i].classList.remove('current-content-tab');
        }
        }
    }
}

for (let i = 0, len = btnTab.length; i < len; i++) {
  btnTab[i].onclick = function() {
   tabCurrent(this);
  }
}

tabCurrent(btnTab[indexOpen]);
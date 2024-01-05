var menuButton = document.querySelector(".menu-button");

 menuButton.addEventListener("click", function(event) {
   event.preventDefault();
   var parent = document.querySelector(".menu-container");
   if (parent.classList.contains("open")) {
     parent.classList.remove("open");
   } else {
     parent.classList.add("open");
   }
});

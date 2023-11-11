window.addEventListener("load", function(){
    document.getElementById("preloading").style.display = "none";
    document.body.style.overflow = "visible";
})

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    document.getElementById("btn-back-to-top").style.display = "block";
    document.getElementById("btn-back-to-top").style.transform = "translate(0px,-10px)";
  } else {
    document.getElementById("btn-back-to-top").style.transform = "translate(0px,60px)";
  }
}

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

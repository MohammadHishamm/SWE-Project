window.addEventListener("load", function () {
  document.getElementById("preloading").style.display = "none";
  document.body.style.overflow = "visible";
});

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("btn-back-to-top").style.display = "block";
    document.getElementById("btn-back-to-top").style.transform =
      "translate(0px,-10px)";
  } else {
    document.getElementById("btn-back-to-top").style.transform =
      "translate(0px,60px)";
  }
}

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

document.addEventListener("DOMContentLoaded", () => {
  $("i").click(function () {
    $("i,span").toggleClass("press", 1000);
  });
});

document.getElementById("addtocart").addEventListener("click", function () {
  var Course_ID = document.getElementById("addtocart").value;

  function run() {
    // Creating Our XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    // Making our connection
    let url = "../php/Home.php";
    let data = {
      " Course_ID": Course_ID,
      scope: "add",
    };
    xhr.open("POST", url, data, true);

    // function execute after request is successful
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };
    // Sending our request
    xhr.send();
  }
  run();
});

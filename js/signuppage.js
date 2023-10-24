const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

//Validation part:--------------------------------------------------

let email = document.getElementById("email");
let email1 = document.getElementById("email1");
let password = document.getElementById("password");
let alert1 = document.getElementById("alert1");
let alert2 = document.getElementById("alert2");
let alert3 = document.getElementById("alert3");
let alert4 = document.getElementById("alert4");
let alert5 = document.getElementById("alert5");
let alert6 = document.getElementById("alert6");
let name1 = document.getElementById("name1");
let password1 = document.getElementById("password1");
let password2 = document.getElementById("password2");

function handleInput() {
  let emailValue = email.value.trim();
  let passwordValue = password.value.trim();

  if (emailValue === "") {
    alert1.innerHTML = "You must enter an email";
  } else if (!isEmail(emailValue)) {
    alert1.innerHTML = "Email is not valid";
  }

  // Checking for password
  if (passwordValue === "") {
    alert2.innerHTML = "Password cannot be blank";
  }
}

///Signup

function handleInputup() {
  let emailValue1 = email1.value.trim();
  let name = name1.value.trim();
  let passwordValue1 = password1.value.trim();
  let passwordValue2 = password2.value.trim();

  if (emailValue1 === "") {
    alert4.innerHTML = "You must enter an email";
  } else if (!isEmail(emailValue1)) {
    alert4.innerHTML = "Email is not valid";
  }
  if (name === "") {
    alert3.innerHTML = "Full name is required";
  }
  if (passwordValue1 === "") {
    alert5.innerHTML = "Password is required";
  }
  if (passwordValue2 === "") {
    alert6.innerHTML = "Password is not the same";
  } else if (passwordValue2 !== passwordValue1) {
    alert6.innerHTML = "Password is not the same";
  }
}
document.getElementById("login").addEventListener("click", () => {
  handleInput();
});
document.getElementById("signup").addEventListener("click", () => {
  handleInputup();
});

function isEmail(email) {
  const re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

/////////////////////////////////////////////////////////////
sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

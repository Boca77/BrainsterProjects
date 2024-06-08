let signupBtn = document.getElementById("signup-btn");
let loginBtn = document.getElementById("login-btn");
let signupForm = document.getElementById("signup");
let loginForm = document.getElementById("login");

if (
  localStorage.getItem("onPage") == "signUp" ||
  !localStorage.getItem("onPage")
) {
  handleSignUp();
}

if (localStorage.getItem("onPage") == "logIn") {
  handleLogIn();
}

loginBtn.addEventListener("click", () => {
  let onPage = "logIn";

  localStorage.setItem("onPage", onPage);

  handleLogIn();
  loginBtn.style.transition = "all 0.8s ease";
  signupBtn.style.transition = "all 0.8s ease";
});

signupBtn.addEventListener("click", () => {
  let onPage = "signUp";

  localStorage.setItem("onPage", onPage);

  handleSignUp();
  signupBtn.style.transition = "all 0.8s ease";
  loginBtn.style.transition = "all 0.8s ease";
});

function handleSignUp() {
  signupBtn.style.backgroundColor = "#68b1a5";

  loginBtn.style.backgroundColor = "#487a72";

  signupForm.classList.add("block");
  signupForm.classList.remove("hidden");

  loginForm.classList.remove("block");
  loginForm.classList.add("hidden");
}

function handleLogIn() {
  loginBtn.style.backgroundColor = "#68b1a5";

  signupBtn.style.backgroundColor = "#487a72";

  loginForm.classList.add("block");
  loginForm.classList.remove("hidden");

  signupForm.classList.remove("block");
  signupForm.classList.add("hidden");
}

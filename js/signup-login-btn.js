let signupBtn = document.getElementById("signup-btn");
let loginBtn = document.getElementById("login-btn");
let signupForm = document.getElementById("signup");
let loginForm = document.getElementById("login");

if (
  localStorage.getItem("onPage") == "signUp" ||
  !localStorage.getItem("onPage")
) {
  signupForm.classList.add("block");
  signupForm.classList.remove("hidden");

  loginForm.classList.remove("block");
  loginForm.classList.add("hidden");
}

if (localStorage.getItem("onPage") == "signUp") {
  signupForm.classList.add("block");
  signupForm.classList.remove("hidden");

  loginForm.classList.remove("block");
  loginForm.classList.add("hidden");
}

loginBtn.addEventListener("click", () => {
  loginBtn.style.backgroundColor = "#68b1a5";
  loginBtn.style.transition = "all 0.8s ease";

  signupBtn.style.backgroundColor = "#487a72";
  signupBtn.style.transition = "all 0.8s ease";

  loginForm.classList.add("block");
  loginForm.classList.remove("hidden");

  signupForm.classList.remove("block");
  signupForm.classList.add("hidden");

  let onPage = "login";

  localStorage.setItem("onPage", onPage);
});

signupBtn.addEventListener("click", () => {
  signupBtn.style.backgroundColor = "#68b1a5";
  signupBtn.style.transition = "all 0.8s ease";

  loginBtn.style.backgroundColor = "#487a72";
  loginBtn.style.transition = "all 0.8s ease";

  signupForm.classList.add("block");
  signupForm.classList.remove("hidden");

  loginForm.classList.remove("block");
  loginForm.classList.add("hidden");

  let onPage = "signUp";

  localStorage.setItem("onPage", onPage);
});

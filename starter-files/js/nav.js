let btn = document.getElementById("burger");
let menu = document.getElementById("menu");
let emp_btn = document.getElementById("employment-btn");
let stat = false;

btn.onclick = function () {
  if (stat === false) {
    btn.classList.toggle("x");
    menu.classList.remove("btn-on");
    emp_btn.classList.remove("btn-on");
    stat = true;
  } else if (stat === true) {
    btn.classList.remove("x");
    menu.classList.toggle("btn-on");
    emp_btn.classList.toggle("btn-on");
    stat = false;
  }
};

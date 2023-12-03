let btn = document.getElementById("burger");
let menu = document.getElementById("menu");
let emp_btn = document.getElementById("employment-btn");
let marketing = document.getElementById("marketing");
let code = document.getElementById("code");
let design = document.getElementById("design");
let codingCards = document.querySelectorAll(".code");
let designCards = document.querySelectorAll(".design");
let marketingCards = document.querySelectorAll(".marketing");
let allCards = document.querySelectorAll(".card");
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

marketing.onclick = function () {
  toggleFilter(marketing);
  filterMarketing();
  showCards(marketing);
};

code.onclick = function () {
  toggleFilter(code);
  filterCoding();
  showCards(code);
};

design.onclick = function () {
  toggleFilter(design);
  filterDesign();
  showCards(design);
};

function showCards(cardType) {
  if (!cardType.classList.contains("filter-on")) {
    showAllCards();
  }
}

function toggleFilter(button) {
  if (!button.classList.contains("filter-on")) {
    button.classList.add("filter-on");
    if (button !== marketing) {
      marketing.classList.remove("filter-on");
    }
    if (button !== code) {
      code.classList.remove("filter-on");
    }
    if (button !== design) {
      design.classList.remove("filter-on");
    }
  } else {
    button.classList.remove("filter-on");
  }
}

function filterCoding() {
  hideAllCards();

  codingCards.forEach((codingCard) => {
    codingCard.style.display = "block";
  });
}

function filterDesign() {
  hideAllCards();

  designCards.forEach((designCard) => {
    designCard.style.display = "block";
  });
}

function filterMarketing() {
  hideAllCards();

  marketingCards.forEach((marketingCard) => {
    marketingCard.style.display = "block";
  });
}

function hideAllCards() {
  allCards.forEach((card) => {
    card.style.display = "none";
  });
}

function showAllCards() {
  allCards.forEach((card) => {
    card.style.display = "block";
  });
}

let footer = document.querySelector("footer");

fetch("https://api.quotable.io/random")
  .then((data) => {
    return data.json();
  })
  .then((data) => {
    footer.innerHTML = data.content;
  });

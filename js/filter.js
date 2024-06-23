let filterContent = document.getElementById("filter-content");
let filter = document.getElementById("filter");
let category = document.querySelectorAll(".category");
const checkboxes = document.querySelectorAll('input[type="checkbox"]');

for (var i = 0; i < checkboxes.length; i++) {
  checkboxes[i].checked = false;
}

filter.addEventListener("click", () => {
  filterContent.classList.toggle("top-1/2");
  filterContent.classList.toggle("opacity-0");
  filterContent.style.transition = "all ease 0.5s";
});

checkboxes.forEach((checkbox) => {
  checkbox.addEventListener("click", () => {
    let anyChecked = false;
    checkboxes.forEach((box) => {
      if (box.checked) {
        anyChecked = true;
      }
    });

    category.forEach((category) => {
      const parentElement =
        category.parentElement.parentElement.parentElement.parentElement;

      if (anyChecked) {
        if (checkbox.checked && category.innerText === checkbox.value) {
          parentElement.style.display = "block";
          parentElement.classList.add("checked");
        } else if (!checkbox.checked && category.innerText === checkbox.value) {
          parentElement.classList.remove("checked");
        }

        if (!parentElement.classList.contains("checked")) {
          parentElement.style.display = "none";
        } else {
          parentElement.style.display = "block";
        }
      } else {
        parentElement.style.display = "block";
        parentElement.classList.remove("checked");
      }
    });
  });
});

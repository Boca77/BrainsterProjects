const customSelect = document.querySelector(".custom-select");
const selectBtn = document.querySelector(".select-button");
const selectedValue = document.querySelector(".selected-value");
const optionsList = document.querySelector(".select-dropdown");

selectBtn.addEventListener("click", (e) => {
  e.preventDefault();
  customSelect.classList.toggle("active");
  selectBtn.setAttribute(
    "aria-expanded",
    selectBtn.getAttribute("aria-expanded") === "true" ? "false" : "true"
  );
});

optionsList.addEventListener("click", (e) => {
  e.preventDefault();
  const selectedOption = e.target.closest("li");
  if (selectedOption) {
    selectedValue.textContent = selectedOption.textContent;
    customSelect.classList.remove("active");
  }
});

document.addEventListener("click", (e) => {
  if (!customSelect.contains(e.target)) {
    customSelect.classList.remove("active");
  }
});

const delBtnBook = document.getElementById("book-del");
const delBtnAuthor = document.getElementById("author-del");
const delBtnCategory = document.getElementById("category-del");

const bookInput = document.getElementById("book_input");
const authorInput = document.getElementById("author_input");
const categoryInput = document.getElementById("category_input");

const errorBook = document.querySelector("#book-error");
const errorAuthor = document.querySelector("#author-error");
const errorCategory = document.querySelector("#cat-error");

console.log(delBtnBook);

delBtnBook.addEventListener("click", (e) => {
  e.preventDefault();
  errorBook.innerHTML = "";
  if (bookInput.value) {
    sweetAlert(
      `http://localhost/project/backEnd/admin/removeBook.php?bookId=${bookInput.value}`
    );
  } else {
    errorBook.innerHTML = "Please select a book";
  }
});

delBtnAuthor.addEventListener("click", (e) => {
  e.preventDefault();
  errorAuthor.innerHTML = "";
  if (authorInput.value) {
    sweetAlert(
      `http://localhost/project/backEnd/admin/removeAuthor.php?author_id=${authorInput.value}`
    );
  } else {
    errorAuthor.innerHTML = "Please select an author";
  }
});

delBtnCategory.addEventListener("click", (e) => {
  e.preventDefault();
  errorCategory.innerHTML = "";
  if (categoryInput.value) {
    sweetAlert(
      `http://localhost/project/backEnd/admin/removeCat.php?cat_id=${categoryInput.value}`
    );
  } else {
    errorCategory.innerHTML = "Please select a category";
  }
});

function sweetAlert(fetchUrl) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  })
    .then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Deleted!",
          text: "Your file has been deleted.",
        });
        fetch(`${fetchUrl}`);
      }
    })
    .then(() => {
      setTimeout(() => {
        location.reload();
      }, 1000);
    });
}
